<?php

$ip_address = $_SERVER['REMOTE_ADDR'];
$ip_blocked = array('::1');

if($ip_address == $ip_blocked)
{
	echo "You're blocked";
}
else{
	echo "Hey! There<br>";
}
echo $ip_address;

echo "<br>";

$ip_address1 = $_SERVER['HTTP_CLIENT_IP'];

echo $ip_address1;

echo "<br>";

$ip_address2 = $_SERVER['HTTP_X_FORWADED_FOR'];

echo $ip_address2;
?>