<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'practice';
$con = mysqli_connect($hostname,$username,$password);

class ServerException extends Exception{}
class DatabaseException extends Exception{}

try{
	if(!@$con)
	{
		throw new ServerException("Couldn't connect to server");
	}
	elseif (!@mysqli_select_db($con,$dbname)) 
	{
		throw new DatabaseException("Database not available");
	}
	else
	{
		echo "Connected";
	}
}
catch (ServerException $ex){
	echo "Error :".$ex->getMessage();
} 

catch (DatabaseException $ex){
	echo "Error :".$ex->getMessage();
}

?>