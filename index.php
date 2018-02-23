<?php
$update=file_get_contents('php://input');
$update=json_decode($update);
define(API_TOKEN,'464435089:AAEQKzQg1dEKVROQhMnMWeuCNzwJA5f5crs');
ob_start();
$text=$update->message->text;
$user_id=$update->message->from->id;
$fname=$update->message->from->first_name;
$lname=$update->message->from->last_name;
$result="Hi Dear $fname $lname
We Recieved Your Message
	'".$text."'";
 $result=urldecode($result); 
  
file_get_contents("https://api.telegram.org/bot".API_TOKEN."/sendMessage?chat_id=".$user_id."&text=".$result);

var_dump($update);
echo "Test: $text  user_id= $user_id";
file_put_contents('log.txt',ob_get_clean());
?>