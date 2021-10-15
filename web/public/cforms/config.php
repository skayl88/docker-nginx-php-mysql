<?php
$config = (object)array(
	'mailto'    => 'zakaz@ollatelecom.ru',      // email получателя zakaz@ollatelecom.ru
	'from'      => 'noreply@megafon.partners',  // email отправителя 
	'smtp'      => array('Z3h2T9r0','mail.megafon.partners',465),         // пароль, SMTP-сервер и порт (если отправлять через SMTP) 
	'logkey'    => 'servisna5',             // пароль к архиву
	'spamfilter'    => false,                // true, если нужно включить спам-фильтр, иначе false
	'recaptchaKey' => '',                   // приватный ключ ReCaptha (v3)
	'recaptcha'     => false                 // true - если нужно проверять ReCaptha, иначе false
)
?>