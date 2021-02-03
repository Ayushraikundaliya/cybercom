<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "form1";
$con = mysqli_connect($hostname,$username,$password,$dbname);

if($con)
{

}
else
{
	die("not connected");
}

?>