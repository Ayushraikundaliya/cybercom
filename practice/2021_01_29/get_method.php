<?php

if(isset($_GET['fname']) && isset($_GET['lname']))
{
	$fname = htmlentities($_GET['fname']);
	$lname = htmlentities($_GET['lname']);
	if(!empty($fname) && !empty($lname))
	{
		echo "Form Submitted<br>";
	}
	else
	{
		echo "Fill all your fields.";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="get_method.php" method="GET">
		<label>First Name</label><br>
		<input type="text" name="fname"><br>
		<label>Last Name</label><br>
		<input type="text" name="lname"><br>
		<input type="submit" value="Submit">
	</form>

</body>
</html>