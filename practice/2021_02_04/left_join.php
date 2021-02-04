<?php

require "connection.php";

$query = "select cricket.playername,user.name from cricket left join user on cricket.id = user.fav_player_id";
if($query_exec = mysqli_query($con,$query))
{
	while ($row = mysqli_fetch_assoc($query_exec)) {
		print_r($row);
	}
}

?>