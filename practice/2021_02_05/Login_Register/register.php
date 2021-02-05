<?php

require "connection.php";

$usernameerr = "";
$emailerr = "";
$passworderr = "";
$cpassworderr = "";
$error = 0;
$cpassword ="";

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword']))
{
	if(!empty($_POST['username']))
	{
		$username = $_POST['username'];
	}
	else
	{
		$usernameerr = "Enter Your Username";
		$error++;
	}
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else
	{
		$emailerr = "Enter Your Email";
		$error++;
	}
	if(!empty($_POST['password']))
	{
		$password = md5($_POST['password']);
	}
	else
	{
		$passworderr = "Enter Your Password";
		$error++;
	}
	if(!empty($_POST['cpassword']))
	{
		$cpassword = md5($_POST['cpassword']);
	}
	else
	{
		$cpassworderr = "Confirm Your Password";
		$error++;
	}
	if($password != $cpassword)
	{
		echo "Password doesn't match";
	}

	if($error == 0)
	{
		if(isset($_POST['submit']))
		{
			$query = "select * from login_user where username='$username' and email='$email'";
			$res_query = mysqli_query($con,$query);
			$row =mysqli_fetch_assoc($res_query);
			if($row > 0)
			{
				if($row['username']==$username)
				{
					echo "Name Already Taken.<br>";
					if($row['email']==$email)
					{
						echo "Email Already Taken.<br>";
					}
				}
			}
			else
			{
				$query1 = "insert into login_user (username,email,password) values ('$username','$email','$password')";
				if(mysqli_query($con,$query1))
				{
					header('location: login.php');
				}
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

	<form method="POST">
		Username: <input type="text" name="username">
		<span><?php echo $usernameerr; ?></span><br><br>
		Email: <input type="text" name="email">
		<span><?php echo $emailerr; ?></span><br><br>
		Password: <input type="password" name="password">
		<span><?php echo $passworderr; ?></span><br><br>
		Confirm Password: <input type="password" name="cpassword">
		<span><?php echo $cpassworderr; ?></span><br><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>