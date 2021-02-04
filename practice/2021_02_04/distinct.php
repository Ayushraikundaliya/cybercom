<?php

require "connection.php";

$query = "select speciality from cricket";
if($query_exec = mysqli_query($con,$query))
{
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);
		echo "<br>";
	}
}

echo "<br>";
echo "Let's use distinct keyword";
echo "<br>";

$query1 = "select distinct speciality from cricket";
if($query_exec = mysqli_query($con,$query1))
{
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);
		echo "<br>";
	}
}
?>