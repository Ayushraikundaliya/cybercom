<?php

include 'server_script.php';

if(isset($_POST['submit']))
{

	echo "Hi i am Header";
	echo "<br>";
	echo $script_name;
	echo "<br>";
}

include 'server_host.php';

echo $host.$script_name;

?>