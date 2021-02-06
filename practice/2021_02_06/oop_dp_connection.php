<?php

class connection{

	public function __construct($hostname,$username,$password)
	{
		echo "Attempting Connection....";

		if(!@$this->connect($hostname,$username,$password))
		{
			echo "Connection Failed.";
		}
		else if ($this->connect($hostname,$username,$password)) 
		{
			echo "Connected to ".$hostname;
		}
	}

	public function connect($hostname,$username,$password)
	{
		$con = mysqli_connect($hostname,$username,$password);
		if(!$con)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}

$conn = new connection('localhost','root','');

?>