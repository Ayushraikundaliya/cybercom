<?php

if(isset($_POST['password']))
{
	if(!empty($_POST['password']))
	{
		$password = md5($_POST['password']);
		$filename = 'password.txt';
		$file = fopen($filename, 'r');
		$file_read = fread($file, filesize($filename));

		if($password == $file_read)
		{
			echo "Password is Correct";
		}
		else
		{
			echo "Incorrect Password";
		}
	}
	else
	{
		echo "Enter a Password";
	}
	
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="md5.php" method="POST">
		Password : <input type="password" name="password"><br>
		<input type="submit" value="Submit">
	</form>

</body>
</html>