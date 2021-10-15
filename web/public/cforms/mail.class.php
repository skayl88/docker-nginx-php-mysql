<?php

/*
-------------------------------------------------
PHP класс для отправки почты
Может отправлять почту с вложенными файлами через smtp, либо через стандартную функцию mail()
-----------------------
Разработка: Александр Ильин (gurpole@mail.ru)
-----------------------
Пример использования:
include "mail.class.php";
$m = new Mail();
$m->from("Сергей<otkogo@asd.com>")->to("komu@asd.ru");
$m->subject("тема письма")->body("текст письма");
$m->attach("/images/foto1.jpg")->attach("/images/toto2.png");
$m->send();

Методы from() и to() задают отправителя (необязательно) и получателя.
Метод subject() определяет тему письма, метод body() - текст письма (может содержать html).
Метод attach($file,$name) добавляет вложенный файл: $file - относительный адрес файла, $name - имя вложения (необязательно).
Если адрес вложенного файла указывается относительно корня сервера, то он должен начинаться с /
Метод send() отправляет письмо.
Можно использовать также методы cc() и bcc() - чтобы задать получателя копии и скрытой копии.
В методах from(), to(), cc() и bcc() можно использовать адреса вида "имя<email>"
В методах to(), cc() и bcc() можно использовать несколько адресов через запятую. С тем же результатом их можно вызвать повторно:
  $m->to(addres1,addres2)->to(addres3)   // письмо будет отправлено трем адресатам
После отправления письма объект $m имеет свойство error, содержащий сообщение об ошибке - если письмо не удалось отправить:
  $m->send();
  if ($m->error) {
	// если письмо не удалось отправить, в $m->error - сообщение об ошибке
  } else {
	// если письмо отправлено успешно, в $m->error - пусто
  }
Чтобы отправить письмо через SMTP, метод from необходимо вызвать с тремя дополнительными аргументами:
  $m->from("email отправителя", "пароль почты отправителя", "адрес SMTP-сервера отправителя", порт);
После отправки письма через SMTP свойство $m->smtpLog будет содержать массив с ответами SMTP-сервера.
По умолчанию письма отправляются в кодировке UTF-8 Если необходимо отправить письмо в другой кодировке, создайте экземпляр класса Mail, указав первым аргументом нужную кодировку:
  $m = Mail('windows-1251');

-------------------------------------------------
*/

class Mail {
	private $_type    = 'text/html';
	private $_charset = 'utf-8';
	private $_subject = '';
	private $_from    = '';
	private $_to      = '';
	private $_cc      = '';
	private $_bcc     = '';
	private $_text    = '';
	private $_attach  = array();
	private $_headers = '';
	private $_body    = '';
	private $_smtp    = array();
	public  $smtpLog = array();
	
	function __construct($charset='') {
		if ($charset) $this->_charset = $charset;
	}
	
	private function addres($a) {
		if (preg_match_all('/([^,]+?)[<\{\[](.+?)[>\}\]]/',$a,$m))
			foreach ($m[0] as $k => $n) {
				$a = str_replace($n,$this->convert($m[1][$k]).'<'.$m[2][$k].'>',$a);
			}
		return $a;
	}
	
	public function from($f, $password='', $server='', $port=25) {
		$this->_from = $this->addres($f);
		if ($password && $server && $port) {
			if ($port == 465 && strpos($server,'ssl://') !== 0) $server = 'ssl://'.$server;
			$_f = explode('@', preg_replace('/([^,]+?)[<\{\[](.+?)[>\}\]]/','\\2',$this->_from));
			$this->_smtp = array('server'=>$server, 'login'=>trim($_f[0]), 'password'=>$password, 'domain'=>trim($_f[1]), 'port'=>$port);
		}
		return $this;
	}

	public function to($t) {
		$this->_to .= ($this->_to ? ',' : '') . $this->addres($t);
		return $this;
	}

	public function cc($c,$n='') {
		$this->_cc .= ($this->_cc ? ',' : '') . $this->addres($c);
		return $this;
	}

	public function bcc($c) {
		$this->_bcc .= ($this->_bcc ? ',' : '') . $this->addres($c);
		return $this;
	}

	public function subject($s) {
		$this->_subject = $this->convert($s);
		return $this;
	}

	public function body($text,$html=true) {
		$this->_text = $text;
		$this->_type = $html ? 'text/html' : 'text/plain';
		return $this;
	}
	
	public function attach($src,$name='',$type='') {
		if (file_exists($src)) $file = $src;
		else {
			$file = realpath($src);
			if ($src[0] == '/' && strpos($src,$_SERVER["DOCUMENT_ROOT"])===false) $file = $_SERVER["DOCUMENT_ROOT"] . $src;
		}
		$this->att = array('src'=>$src, 'file'=>$file, 'file_exists'=>file_exists($file),'root'=>$_SERVER["DOCUMENT_ROOT"],'realpath'=>realpath($src));
		if ($this->_attach[$src] || !@file_exists($file)) return;
		$ftype = $type ? $type : mime_content_type($file);
		$fname = basename($file);
		if (!$name) $name = $fname;
		$this->_attach[$src] = array('file'=>$file, 'fname'=>$fname, 'type'=>$ftype, 'name'=>$name);
		return $this;
	}
	
	public function attach_build($boundary) {
		if (!count($this->_attach)) return;
		$list = '';
		foreach ($this->_attach as $a) {
			$list .= '--' . $boundary . "\r\n" .
			'Content-type: ' . $a['type'] . '; name="' . $this->convert($a['name']) . '"' . "\r\n" .
			'Content-Transfer-Encoding: base64' . "\r\n" .
			'Content-Disposition: attachment' . "\r\n\r\n" .
			chunk_split(base64_encode(file_get_contents($a['file']))) . "\r\n\r\n";
		}
		return $list;
	}
	
	public function send($log='') {
		$boundary = '--' . md5(rand());
		if (!$this->_subject) $this->_subject = $this->convert('Сообщение с сайта ' . $_SERVER["HTTP_HOST"]);
		$headers = "Date: " . date("D, j M Y G:i:s") . " +0700\r\n";
		if ($this->_smtp) $headers .= "Subject: ".$this->_subject."\r\n";
		if ($this->_from) $headers .= "From: ".$this->_from."\r\nReply-To: ".$this->_from."\r\n";
		if ($this->_cc)   $headers .= "CC: ".$this->_cc."\r\n";
		if ($this->_bcc)  $headers .= "BCC: ".$this->_bcc."\r\n";
		$headers .= "Mime-Version: 1.0\r\n";
		if (!$this->_attach) $headers .= "Content-type: ".$this->_type."; charset=".$this->_charset."\r\n";
		else $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\nContent-Transfer-Encoding: 8bit\r\n";
		$this->_headers = $headers .= 'X-Mailer: PHP/' . phpversion()."\r\n";
		$this->_body = $this->_text;
		if (count($this->_attach) > 0)
			$this->_body = "--$boundary\r\nContent-type: ".$this->_type."; charset=".$this->_charset.
					"\r\nContent-Transfer-Encoding: 8b\r\n\r\n" . $this->_body . "\r\n" . $this->attach_build($boundary);
		if (!$this->_to)   { $this->error = 'Не указан адрес отправления письма.'; return 'NONE_MAILTO'; }
		if (!$this->_text) { $this->error = 'Отсутствует текст письма.'; return 'NONE_MAILTEXT'; }
		if ($this->_smtp) return $this->smtp_return = $this->smtp_send();
		if (!mail($this->_to, $this->_subject, $this->_body, $headers)) return 'MAILSEND_FAILED';
		return '';
	}
	
	private function smtp_send() {
		if (!$this->_smtp['server'] || !$this->_smtp['port'] || !$this->_smtp['login'] || !$this->_from || !$this->_to) return 'NONE_MAILTO';
		$smtp_conn = fsockopen($this->_smtp['server'], $this->_smtp['port'], $errno, $errstr, 5);
		if ($errno || !$smtp_conn) {
			$this->error = 'Не установлено соединение с SMTP сервером'; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		$code = 0; $aTo = explode(',', $this->_to);
		$this->smtpLog['CONNECT'] = $this->smtp($smtp_conn);
		$this->smtpLog['ELHO'] = $this->smtp($smtp_conn, "EHLO ".$this->_smtp['login'], $code);
		if ($code != 250) { 
			$this->error = 'SMTP: ошибка приветсвия EHLO'; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		$this->smtpLog['AUTH'] = $this->smtp($smtp_conn, "AUTH LOGIN", $code);
		if ($code != 334) {
			$this->error = 'SMTP: сервер не разрешил начать авторизацию'; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		$this->smtpLog['LOGIN'] = $this->smtp($smtp_conn, base64_encode($this->_from), $code);
		if ($code != 334) {
			$this->error = 'SMTP: ошибка авторизации (неправильный логин '.$this->_from.')'; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		$this->smtpLog['PASSW'] = $this->smtp($smtp_conn, base64_encode($this->_smtp['password']), $code);
		if ($code != 235) {
			$this->error = 'SMTP: ошибка авторизации (неправильный пароль)'; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		$this->smtpLog['FROM'] = $this->smtp($smtp_conn, "MAIL FROM:".$this->_from, $code);
		if ($code != 250) {
			$this->error = 'SMTP: отказано в команде FROM:'.$this->_from; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		foreach ($aTo as $n => $to) {
			$this->smtpLog['TO'.($n?'-'.$n:'')] = $this->smtp($smtp_conn, "RCPT TO:$to", $code);
			if ($code != 250 AND $code != 251) { 
				$this->error = 'SMTP: отказано в команде RCPT TO:$to'; fclose($smtp_conn); return 'MAILSEND_FAILED';
			}
		}
		$this->smtpLog['DATA'] = $this->smtp($smtp_conn, "DATA", $code);
		if ($code != 354) {
			$this->error = 'SMTP: отказано в команде DATA'; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		$this->smtpLog['MAILTO'] = $this->smtp($smtp_conn, $this->_headers."\r\n".$this->_body."\r\n.", $code);
		if ($code != 250) {
			$this->error = 'SMTP: ошибка отправки письма'; fclose($smtp_conn); return 'MAILSEND_FAILED';
		}
		$this->smtpLog['QUIT'] = $this->smtp($smtp_conn, "QUIT", $code);
		fclose($smtp_conn);
		return '';
	}

	private function smtp($smtp_conn, $com='', &$code=0) {
		$data="";
		if ($com) fputs($smtp_conn, $com."\r\n");
		while($str = fgets($smtp_conn,515)) {
			$data .= $str;
			if(substr($str,3,1) == " ") { break; }
		}
		if ($com) $code = (int)substr($data,0,3);
		return $data;
	}

	private function convert($s) {
	  return '=?UTF-8?B?'.base64_encode($s).'?=';
	}

}


if(!function_exists('mime_content_type')) {
    function mime_content_type($filename) {
        $mime_types = array(
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );
        $ext = strtolower(array_pop(explode('.',$filename)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        }
        else {
            return 'application/octet-stream';
        }
    }
}



?>