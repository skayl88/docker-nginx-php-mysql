<?php

function spamlog($st) {
	if (is_dir('log/spam')) file_put_contents('log/spam/'.time().'.txt', date('Y-m-d H:i:s')."\r\n".$st."\r\n".print_r($_POST,true));
	print '{"error":"' . $st . '"}';
	exit;
}
function formOutput($t,$hf,$exit=false) {
	if (!$hf) print $t; else print "<html><body onload=\"parent.formIframeOnLoad($t)\"></body></html>";
	if ($exit) exit;
}
function reCaptcha($key) {
	$recaptcha = array();
	$recaptcha['query'] = http_build_query(array('secret'=>$key, 'response'=>$_POST['g-recaptcha-response']));
	$recaptcha['options'] = array('http' => array('method' => 'POST', 'content' => $recaptcha['query'])); 
	$recaptcha['request'] = stream_context_create($recaptcha['options']); 
	$recaptcha['responseText'] = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $recaptcha['request'], -1, 40000);
	$recaptcha['response'] = json_decode($recaptcha['responseText']);
	return $recaptcha['response'];
	# in php.ini unconmment line extension=php_openssl.dll
}

$host = $_SERVER["HTTP_HOST"];
if ((strpos($host,'XN--')===0 || strpos($host,'xn--')===0) && file_exists('idna_convert.class.php')) {
	require_once( "idna_convert.class.php");
	$IDN = new idna_convert();
	$host = $IDN->decode($host);
}
$referer = $_SERVER['HTTP_REFERER'];
$url = $host . str_replace('?'.$_SERVER['QUERY_STRING'],'',$_SERVER["REQUEST_URI"]);
include_once("config.php");
$response = '';

if ($_POST['k'] == 'rg9OItWLXx') {
	if ($config->spamfilter == true) {
		session_start();
		$sid = session_id();
		$_SESSION['cforms'] = array(md5(mt_rand()), md5(mt_rand()));
		print '["'.$_SESSION['cforms'][0].'","'.$_SESSION['cforms'][1].'","'.$sid.'"]';
	}
	exit;
}

if (!empty($_POST['_formdata_'])) {
	$data = array();
	parse_str($_POST['_formdata_'], $data);
	unset($_POST['_formdata_']);
	$msgSpam = $data['msgspam'] ? $data['msgspam']:'Сообщение расценено как спам';
	if ($config->spamfilter == true) {
		session_id($data['sid']);
		session_start();
		if (!isset($_SESSION['cforms'])) spamlog($msgSpam.' (none session)');
		$k = $_SESSION['cforms'];
		if (@$data[$k[0]] != $k[1]) spamlog($msgSpam.' (invalid token)');
	}
	$formRecaptcha = ($config->recaptcha === true);
	if (is_array($config->recaptcha) && !empty($data['formid'])) if (array_search($config->recaptcha[$data['formid']])) $formRecaptcha = true;
	if ($config->recaptchaKey != '' && $formRecaptcha) {
		$err_msg = $msgSpam.' (recaptcha error)';
		if (empty($_POST['g-recaptcha-response'])) formOutput('{"error":"'.$err_msg.'"}', @$data['hidden_frame'], true);
		$rcr = reCaptcha($config->recaptchaKey);
		$minScore = $data['minscore'] ? floatval($data['minscore']) : 0.5;
		if (!$rcr->success) formOutput('{"error":"'.$err_msg.'"}', @$data['hidden_frame'],true);
		else {
			if (isset($rcr->score)) if ($rcr->score < $minScore) formOutput('{"error":"'.$err_msg.'"}', @$data['hidden_frame'],true);
		}
	}
	if (isset($_POST['g-recaptcha-response'])) unset($_POST['g-recaptcha-response']);
	if (!isset($data['empty'])) $data['empty'] = '–';
	if (strpos($data['subject'],'$') !== false) eval('$data["subject"] = "'.$data['subject'].'";');
	if (strpos($data['mhead'],'$') !== false) eval('$data["mhead"] = "'.$data['mhead'].'";');
	if (strpos($data['mfooter'],'$') !== false) eval('$data["mfooter"] = "'.$data['mfooter'].'";');
	if ($data['userto'] && $_POST['Email']) {
		if (substr($data['userto'],-5) == '.html' && file_exists($_SERVER["DOCUMENT_ROOT"].$data['userto']))
		$data['userto'] = file_get_contents($_SERVER["DOCUMENT_ROOT"].$data['userto']);
		if (strpos($data['userto'],'$') !== false) eval('$data["userto"] = "'.$data['userto'].'";');
	};
	if (count($_FILES) > 0) foreach ($_FILES as $name => $f) {
		if ($f['error'] > 0 || !$f['tmp_name']) continue;
		$_POST[$name] = $f['name'] . ' (' . ($data['seeatt'] ? $data['seeatt'] : 'см. вложение') . ')';
	}
	ob_start();
	include "mail.tpl.php";
	$mail = ob_get_contents();
	if (!empty($data['include']) && file_exists($_SERVER["DOCUMENT_ROOT"].$data['include'])) {
		if (substr($data['include'],-5) == '.html') {
			$_mail = file_get_contents($_SERVER["DOCUMENT_ROOT"].$data['include']);
			if (strpos($_mail,'$') !== false) eval('$_mail = "'.$_mail.'";');
			$mail = $_mail;
		}
		if (substr($form['include'],-4) == '.php') {
			include $_SERVER["DOCUMENT_ROOT"].$data['include'];
			$_mail = ob_get_contents();
			if ($_mail) $mail = $_mail;
		}
		 unset($_mail);
	}
	ob_end_clean();
	include_once("mail.class.php");
	$m = new Mail();
	$mailto = $config->mailto;
	if ($data['formid']) {
		$maitokey = $data['formid'] .'_mailto';
		if (isset($config->$maitokey)) $mailto = $config->$maitokey;
	}
	$m->to($mailto);
	if ($data['subject']) $m->subject($data['subject']);
	if ($config->from) $m->from($config->from, $config->smtp[0], $config->smtp[1], $config->smtp[2]);
	if ($config->cc) $m->cc($config->cc);
	if ($config->bcc) $m->bcc($config->bcc);
	$m->body($mail);
	if (count($_FILES) > 0) foreach ($_FILES as $name => $f) {
		if ($f['error'] > 0 || !$f['tmp_name']) continue;
		$fileExt = strtolower(strrchr($f['name'],'.'));
		if (!preg_match('/\.(exe|com|bak|php)$/i',$f['name'])) $m->attach($f['tmp_name'], $f['name'], $f['type']);
		else $m->error = $data['msgFileError'] ? $data['msgFileError'] : 'Выбранный файл потенциально опасен!';
	}
	if (!empty($data['attach'])) {
		$attach = explode(',',$data['attach']);
		foreach ($attach as $a) $m->attach($a);
	}
	if (!$m->error) $m->send();
	if ($m->error) file_put_contents('log/error.txt',print_r($m,true));
	else {
		if ($data['userto'] && $_POST['Email']) {
			$m2 = new Mail();
			$m2->to($_POST['Email']);
			if ($data['subject']) $m2->subject($data['subject']);
			if ($config->from) $m->from($config->from, $config->smtp[0], $config->smtp[1], $config->smtp[2]);
			$m2->body($data['userto']);
			if (!empty($data['useratt'])) {
				$attach = explode(',',$data['useratt']);
				foreach ($attach as $a) $m2->attach($a);
			}
			$m2->send();
		}
		$logMail = htmlspecialchars(preg_replace('/ (valign|style)=".+?"/','',$mail));
		$logXML = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n<form".($data['formid']?' id="'.$data['formid'].'"':'')." to=\"{$config->mailto}\" date=\"".date('d.m.Y H:i:s')."\" referer=\"$referer\">\r\n  <report>".$logMail."</report>\r\n</form>";
		file_put_contents('log/'.time().'.xml', $logXML);
		//file_put_contents('log/log.txt', print_r($m, true));
	}
	if ($m->error) {
		formOutput('{"error":"'.$m->error.'"}', @$data['hidden_frame']);
		file_put_contents('log/error.txt', print_r($m, true));
	} else {
		formOutput('{response:"'.$response.'"}', @$data['hidden_frame']);
	}
	exit;
}

$_SESSION['cforms'] = array('','');


?>