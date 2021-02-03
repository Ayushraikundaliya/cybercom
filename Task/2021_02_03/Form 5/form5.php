<?php

require "connection.php";

$emailerr = "";
$passworderr = "";
$error = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else
	{
		$emailerr = "Enter an email";
		$error++;
	}
	if(!empty($_POST['password']))
	{
		$password = $_POST['password'];
	}
	else
	{
		$passworderr = "Enter your password";
		$error++;
	}
}

if(isset($_POST['submit']))
{
	if($error == 0)
	{
		$query1 = "select * from signin where email='$email' OR password='$password'";
		$res_query1 = mysqli_query($con,$query1);
		$row =mysqli_fetch_assoc($res_query1);	
		if ($row['email'] == $email && $row['password'] == $password)  
		{
			echo "Logged In.";
		}
		else
		{
			echo "Incorrect Email or Password";
		}
	}
	
}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Form 5</title>
	<link rel="stylesheet" type="text/css" href="form5.css">
</head>
<body>

	<form action="form5.php" method="POST" name="signin" onsubmit="return formVal();">
		<div class="header">
			<table>
				<tr>
					<td>Sign in</td>
				</tr>
			</table>
		</div>
		<div class="body">
			<table>
				<tr>
					<td>E-mail Address</td>
				</tr>
				<tr>
					<td>
						<input type="email" name="email" id="email" placeholder="mail@address.com">
						<span id="spanemail"></span>
						<span><?php echo $emailerr;?></span>
						
					</td>
				</tr>
				<tr>
					<td>Password</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="password" id="password" placeholder="password">
						<span id="spanpassword"></span>
						<span><?php echo $passworderr;?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="footer">
			<input type="submit" name="submit" id="submit" class="button" value="Sign in">	
		</div>
	</form>

	<script type="text/javascript" src="form5.js"></script>

</body>
</html>