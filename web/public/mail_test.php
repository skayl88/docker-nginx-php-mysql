<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;

$order = '';
if (!empty($_COOKIE['utm'])) {
	foreach ($_COOKIE['utm'] as $i => $row) {
		$order .= $i . ': ' . $row . "\r\n";
	}
}
 

if ( $method === 'POST' ) {

	$project_name = 'Заявка с berkanasoft.ru ';
	$admin_email  = 'skayl8827@gmail.com';
	$form_subject = 'Заявка с berkanasoft.ru';
 

 


	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} else if ( $method === 'GET' ) {

	$project_name = 'Заявка с berkanasoft.ru';
	$admin_email  = 'Berkana@berkanasoft.ru';
	$form_subject = 'Заявка с berkanasoft.ru';

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message $order $url</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

if ($_SERVER['REMOTE_ADDR'] <> '37.192.53.109') 
mail($admin_email, adopt($form_subject), $message, $headers );