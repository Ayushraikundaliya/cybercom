<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blogapp';

$connect = mysqli_connect($hostname,$username,$password,$dbname);

if($connect)
{

}
else
{
	die("not connected");
}

?>