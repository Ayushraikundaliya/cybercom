<?php

require "connection.php";

session_start();

$usernameerr = "";
$passworderr = "";
$error = 0;

if (isset($_POST['username']) && isset($_POST['password'])) 
{
	
	$password = $_POST['password'];
	if (!empty($_POST['username'])) 
	{
		$username = $_POST['username'];
	}
	else
	{
		$usernameerr = "Enter your username";
		$error++;
	}
	if(!empty($_POST['password']))
	{
		$password = md5($_POST['password']);
	}
	else
	{
		$passworderr = "Enter your password";
		$error++;
	}

	if($error == 0)
	{
		if (isset($_POST['submit'])) 
		{
			$query = "select id from login_user where username = '$username' AND password = '$password'";
			$query_exec = mysqli_query($con,$query);
			if($query_exec)
			{
				$query_nums_rows = mysqli_num_rows($query_exec);
				if($query_nums_rows == 0)
				{
					echo "Invalid Login username/password";
				}
				else if($query_nums_rows == 1)
				{	
					echo "You're logged in";
				}
			}
		}
	}
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>

	<form method="POST">
		Username : <input type="text" name="username">
		<span><?php echo $usernameerr; ?></span><br><br>
		Password : <input type="password" name="password">
		<span><?php echo $passworderr; ?></span><br><br>	
		<input type="submit" name="submit">
	</form>

</body>
</html>