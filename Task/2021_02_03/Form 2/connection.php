<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "form2";
$con = mysqli_connect($hostname,$username,$password,$dbname);

if($con)
{

}
else
{
	die("not connected");
}

?>