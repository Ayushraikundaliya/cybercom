<?php

$to = 'ayushrk09@gmail.com';
$subject = 'php-email';
$body = 'I am sendign this mail through php';
$headers = 'From: ayushraikundaliya@gmail.com';

if(mail($to, $subject, $body,$headers))
{
	echo "Email Sent";
}
else
{
	echo "Email Not sent";
}

?>