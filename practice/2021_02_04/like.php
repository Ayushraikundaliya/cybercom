<?php

require "connection.php";

$query = "select playername from cricket where playername like '%Pathan'";
if($query_exec = mysqli_query($con,$query))
{
	echo "Query 1";
	echo "<br>";
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);
	}
	echo "<br>";
	echo "<br>";
}

$query1 = "select playername from cricket where playername like 'Pathan%'";
if($query_exec = mysqli_query($con,$query1))
{
	echo "Query 2";
	echo "<br>";
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);
	}
	echo "<br>";
	echo "<br>";
}

$query2 = "select playername from cricket where playername like 'Virat%'";
if($query_exec = mysqli_query($con,$query2))
{
	echo "Query 3";
	echo "<br>";
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);	
	}
	echo "<br>";
	echo "<br>";
}

$query3 = "select playername from cricket where playername like '%Virat'";
if($query_exec = mysqli_query($con,$query3))
{
	echo "Query 4";
	echo "<br>";
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);	
	}
	echo "<br>";
	echo "<br>";
}

$query4 = "select playername from cricket where playername like '%Virat%'";
if($query_exec = mysqli_query($con,$query4))
{
	echo "Query 5";
	echo "<br>";
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);	
	}
	echo "<br>";
	echo "<br>";
}

$query5 = "select playername from cricket where playername not like 'Virat%'";
if($query_exec = mysqli_query($con,$query5))
{
	echo "Query 6";
	echo "<br>";
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);	
	}
	echo "<br>";
	echo "<br>";
}

$query6 = "select playername from cricket where playername like 'Irfan __than'";
if($query_exec = mysqli_query($con,$query6))
{
	echo "Query 7";
	echo "<br>";
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);	
	}
	echo "<br>";
	echo "<br>";
}

?>