<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'practice';

$con = mysqli_connect($hostname,$username,$password,$dbname);

if(!$con)
{
	die();
}


?>
