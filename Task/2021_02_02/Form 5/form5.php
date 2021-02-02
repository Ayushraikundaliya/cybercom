<?php

$emailerr = "";
$passworderr = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else
	{
		$emailerr = "Enter an email";
	}
	if(!empty($_POST['password']))
	{
		$password = $_POST['password'];
	}
	else
	{
		$passworderr = "Enter your password";
	}
}

if(isset($_POST['submit']))
{
	if($email == "ayushrk09@gmail.com" && $password == "abcdefghi")
	{
		echo "Welcome You're Signed in.";
	}
	else
	{
		echo "Password incorrect";
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