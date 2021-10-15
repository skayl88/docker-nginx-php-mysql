<?php   

$type = $_POST['type'];
$company = $_POST['company'];
$name = $_POST['name'];
$url = $_POST['url'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$sfera = $_POST['sfera'];
$sfera_other = $_POST['sfera_other'];
$workin = $_POST['workin'];
$workin_other = $_POST['workin_other'];
$chanel = $_POST['chanel'];
$chanel_other = $_POST['chanel_other'];
$utm_source = $_POST['utm_source'];

if (!empty($_SESSION['utm'])) {
  $utm_term = $_SESSION['utm']['utm_term'];
  $utm_source = $_SESSION['utm']['utm_source'];
  $utm_medium = $_SESSION['utm']['utm_medium'];
  $utm_campaing = $_SESSION['utm']['utm_campaing'];
  $utm_content = $_SESSION['utm']['utm_content'];
	foreach ($_SESSION['utm'] as $i => $row) {
		$order .= $i . ': ' . $row . "\r\n";
	}
}


// Multiple recipients
$to = 'info@ollaberkana.ru, skayl8827@gmail.com'; // note the comma

// Subject
$subject = 'Новая заявка ';
$kvest ="";

if ($type=="Квиз") {
  $kvest=" 
  <tr>
      <td>  Сфера </td> <td>' . $sfera. '</td>
  </tr>
  <tr>
    <td> сфера_другое </td> <td>' . $sfera_other. '</td>
  </tr> 
  <tr>
    <td> Работал в  </td> <td>' . $workin. '</td>
  </tr>
  <tr>
  <td> Работал в другом </td> <td>' . $workin_other. '</td>
  </tr>
  <tr>
  <td> Канал  </td> <td>' . $chanel. '</td>
  </tr>
  <tr>
  <td> Канал другой </td> <td>' . $chanel_other. '</td>
  </tr>";
}


// Message
$message = '
<html>
<head>
  <title>Новая заявка</title>
</head>
<body>
  <table>
    <tr>
      <td>Имя </td><td>' . $name. '</td>
    </tr>
    <tr>
        <td>Телефон  </td><td>' . $phone . '</td>
    </tr>
    <tr>
        <td>Почта </td><td>' . $email. '</td>
    </tr>
    <tr>
        <td>Компания   </td><td>' . $company. '</td>
    </tr>
   ' .$kvest. '
    <tr>
        <td>Url </td><td>' .$url. '</td>
    </tr>
    <tr>
        <td>$utm_source</td><td>' .$utm_source . '</td>
    </tr>
    <tr>
    <td>utm_medium</td><td>' .$utm_medium. '</td>
</tr>
<tr>
<td>utm_campaing</td><td>' .$utm_campaing. '</td>
</tr>
<tr>
<td>utm_content</td><td>' .$utm_content. '</td>
</tr>
<tr>
<td>utm_campaing</td><td>' .  $utm_term. '</td>
</tr>

  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = "Content-type: text/html; charset=utf-8";

// Additional headers
$headers[] = 'To: Olla <skayl8827@gmail.com>';
$headers[] = 'From: Новая заявка Беркана <noreply@test.com>';
// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));


  $queryUrl = 'https://ollatelecom.bitrix24.ru/rest/20/b4wzwemai84tloit/crm.lead.add.json';
  // формируем параметры для создания лида в переменной $queryData
  $param = ['fields' => 
  ["TITLE" => $type, 
  "STATUS_ID" => "NEW",
  "OPENED" => "Y",
  "SOURCE_ID" => "79643429993",
  "NAME" => $name, 
  "ASSIGNED_BY_ID" => 96, 

  'COMMENTS' => $company, 
  "UTM_SOURCE" =>    $utm_source ,
  "UTM_MEDIUM" => $utm_medium, 
  "UTM_CAMPAIGN" => $utm_campaing,
  "UTM_CONTENT" => $utm_content ,
  "UTM_TERM" =>$utm_term,
"UF_CRM_1631788584" => $url,
"COMMENTS" => $kviz ,

"UF_CRM_1631787877" =>  $sfera,
"UF_CRM_1631787902" =>  $workin,
"UF_CRM_1631787919" =>  $chanel,
  "PHONE" => array(array("VALUE" => $phone, "VALUE_TYPE" => "WORK" )), 
  "EMAIL" => array(array("VALUE" => $email, "VALUE_TYPE" => "WORK" )),],
  'params' => ['REGISTER_SONET_EVENT' => "Y"]];
  
	  $log = date('Y-m-d H:i:s') . ' ' . print_r( $param , true);
file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);

       $queryData = http_build_query($param);
  // обращаемся к Битрикс24 при помощи функции curl_exec
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData,
    CURLOPT_USERAGENT =>  'api',
    CURLOPT_TIMEOUT =>  1,
    CURLOPT_HEADER =>  0,
    CURLOPT_RETURNTRANSFER => false,
    CURLOPT_FORBID_REUSE =>  true,
    CURLOPT_CONNECTTIMEOUT =>  5,
    CURLOPT_DNS_CACHE_TIMEOUT => 2,
    CURLOPT_FRESH_CONNECT =>true,
  ));
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);