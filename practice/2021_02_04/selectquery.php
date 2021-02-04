<?php

require 'connection.php';

$query = "select * from cricket order by id desc";

if($query_exec = mysqli_query($con,$query))
{
	while($row = mysqli_fetch_assoc($query_exec))
	{
		$id = $row['id'];
		$playername = $row['playername'];
		$speciality = $row['speciality'];
		echo $id.'. '.$playername.' is a best '.$speciality.'.<br>';
	}
}

?>