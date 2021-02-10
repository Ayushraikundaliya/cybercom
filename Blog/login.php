<?php

require_once 'connection.php';

$emailerr = "";
$passwordhasherr = "";
$error = 0;

if(isset($_POST['email']) && isset($_POST['passwordhash'])) 
{
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else
	{
		$emailerr = "Please enter your Mail id";
		$error++;
	}
	if(!empty($_POST['passwordhash']))
	{
		$passwordhash = md5($_POST['passwordhash']);
	}
	else
	{
		$passwordhasherr = "Please enter your Password";
		$error++;
	}	

	if($error == 0)
	{
		if(isset($_POST['login']))
		{

			$query = "select id from user where email = '$email' AND passwordhash = '$passwordhash'";
			$query_exec = mysqli_query($connect,$query);
			if($query_exec)
			{
				$query_nums_rows = mysqli_num_rows($query_exec);
				if($query_nums_rows == 0)
				{
					echo "Invalid Login username/password";
				}
				else if($query_nums_rows == 1)
				{	
					$id = $_GET['id'];
					date_default_timezone_set('Asia/Kolkata');
					$lastloginat = date('y-m-d h:i:s');
					$query1 = mysqli_query("update user set lastloginat='$lastloginat' where id='$id'");
					echo "<script>window.location.href='blogpost.php';</script>";
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="login">
		<form method="POST">
			<fieldset>
				<h1 style="text-align: center;">LOGIN</h1>
				<table>
					<tr>
						<td>Email</td>
					</tr>
					<tr>
						<td><input type="email" name="email" id="email" value="<?php echo $emailerr; ?>"></td>
					</tr>
					<tr>
						<td><br></td>
					</tr>
					<tr>
						<td>Password</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="passwordhash" id="passwordhash" value="<?php echo $passwordhasherr; ?>">
						</td>
					</tr>
					<tr>
						<td><br></td>
					</tr>
					<tr>
						<td>
							<button id="login" name="login">LOGIN</button>
							<button onclick="location.href='register.php'" id="register" name="register"><a href="register.php">REGISTER</a></button>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>

</body>
</html>