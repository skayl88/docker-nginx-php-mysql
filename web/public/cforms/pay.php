

<?php

///// Sender.php ///////

$secret_seed = "olla";
  $id = $_POST['id'];
  $sum = $_POST['sum'];
  $clientid = $_POST['clientid'];
  $orderid = $_POST['orderid'];
  $key = $_POST['key'];
  $phone = $_POST['client_phone'];
  $email = $_POST['client_email'];
  $hash = md5($id.$secret_seed);
 
  if ($key != md5 ($id.number_format($sum, 2, ".", "")
                   .$clientid.$orderid.$secret_seed))
  {
      echo "Error! Hash mismatch";
      exit;
  }
  echo "OK ".$hash;

//Set up some vars
$url = 'https://beeline.partners/cforms/send.php';

$auth_key = 'Key';

$fields = array(
            'auth'=>urlencode($auth_key),
            'client_phone'=>urlencode($phone),
            'client_email'=>urlencode($email),
            'clientid'=>urlencode($clientid),
            'sum'=>urlencode($sum),
          
        );

// Init. string
$fields_string = '';
// URL-ify stuff
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_USERAGENT, 'api');
curl_setopt($ch, CURLOPT_TIMEOUT, 1); 
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 1); 

curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);



?>