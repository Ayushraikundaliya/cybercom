<?php

require_once 'functions.php';
require_once 'connection.php';

$insert = new Database();

$prefixerr ="";
$firstnameerr ="";
$lastnameerr = "";
$emailerr = "";
$mobileerr = "";
$passwordhasherr = "";
$cpasswordhasherr = "";
$informationerr ="";
$agreeerr = "";
$error = 0;

if(isset($_POST['prefix']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['passwordhash']) && isset($_POST['cpasswordhash']) && isset($_POST['information']) && isset($_POST['agree']))
{
	if(!empty($_POST['prefix']))
	{
		$prefix = $_POST['prefix'];
	}
	else
	{
		$prefixerr = "Please select your Prefix";
		$error++;
	}
	if(!empty($_POST['firstname']))
	{
		$firstname = $_POST['firstname'];
	}
	else
	{
		$firstnameerr = "Please Enter your First Name";
		$error++;
	}
	if(!empty($_POST['lastname']))
	{
		$lastname = $_POST['lastname'];
	}
	else
	{
		$prefixerr = "Please Enter your Last Name";
		$error++;
	}
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else
	{
		$emailerr = "Please enter your Mail id";
		$error++;
	}
	if(!empty($_POST['mobile']))
	{
		$mobile = $_POST['mobile'];
	}
	else
	{
		$mobileerr = "Please enter your Mobile number";
		$error++;
	}
	if(!empty($_POST['passwordhash']))
	{
		$passwordhash = $_POST['passwordhash'];
	}
	else
	{
		$passwordhasherr = "Please enter your Password";
		$error++;
	}
	if(!empty($_POST['cpasswordhash']))
	{
		$cpasswordhash = $_POST['cpasswordhash'];
	}
	else
	{
		$cpasswordhasherr = "Please enter your confirm Password";
		$error++;
	}
	if($passwordhash < 8)
	{
		echo "<script>alert('Password must be 8 character long')";
	}
	if($passwordhash != $cpasswordhash)
	{
		echo "<script>alert('Password Not Matched')";
		$error++;
	}
	if(!empty($_POST['information']))
	{
		$information = $_POST['information'];
	}
	else
	{
		$informationerr = "Please enter information";
		$error++;
	}
	if(!empty($_POST['agree']))
	{
		$agree = $_POST['agree'];
	}
	else
	{
		$agreeerr = "Please accept Terms & Conditions";
		$error++;
	}

	if($error == 0)
	{
		if(isset($_POST['submit']))
		{
			$query1 = "select * from user where email='$email'";
			$res_query1 = mysqli_query($connect,$query1);
			$row =mysqli_fetch_assoc($res_query1);

			date_default_timezone_set('Asia/Kolkata');
			$createdat = date('y-m-d h:i:s');
			$lastloginat = date('y-m-d h:i:s');
			$updatedat = date('y-m-d h:i:s');

			if($row > 0)
			{
				echo "<script>alert('Email already taken');</script>";
				echo "<script>window.location.href='register.php';</script>";
			}
			else
			{	
				$sql = $insert->insert($prefix,$firstname,$lastname,$mobile,$email,md5($passwordhash),$lastloginat,$information,$createdat,$updatedat);
				if($sql)
				{
					echo "<script>alert('Record inserted Successfully');</script>";
					echo "<script>window.location.href='login.php';</script>";
				}
			}
		}
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="register">
		<form method="POST">
			<fieldset>
				<h1 style="text-align: center;">REGISTER</h1>	
				<table>
					<tr>
						<td>Prefix</td>
						<td>
							<select name="prefix" id="prefix" required="required" value="<?php echo $prefixerr; ?>">
								<option value=""></option>
								<option value="mrs">MRS</option>
								<option value="mr">MR</option>
								<option class="miss">miss</option>	
							</select>
						</td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><input type="text" name="firstname" id="firstname" oninvalid="InvalidFirstName(this);" oninput="InvalidFirstName(this);" value="<?php echo $firstnameerr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type="text" name="lastname" id="lastname" oninvalid="InvalidLastName(this);" oninput="InvalidLastName(this);" value="<?php echo $lastnameerr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="InvalidEmail(this);" oninput="InvalidEmail(this);" value="<?php echo $emailerr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Mobile Number</td>
						<td><input type="text" name="mobile" id="mobile" oninvalid="InvalidMobile(this);" oninput="InvalidMobile(this);" value="<?php echo $mobileerr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="passwordhash" id="passwordhash" oninvalid="InvalidPasswordhash(this);" oninput="InvalidPasswordhash(this);" value="<?php echo $passwordhasherr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type="password" name="cpasswordhash" id="cpasswordhash" oninvalid="InvalidcPasswordhash(this);" oninput="InvalidcPasswordhash(this);" value="<?php echo $cpasswordhasherr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Information</td>
						<td><textarea rows="5" cols="35" name="information" id="information" oninvalid="InvalidInformation(this);" oninput="InvalidInformation(this);" value="<?php echo $informationerr; ?>" required="required"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="checkbox" id="agree" name="agree" value="agree" oninvalid="InvalidAgree(this);" oninput="InvalidAgree(this);" value="<?php echo $agreeerr; ?>" required="required">Hereby, I accept Terms & Conditions.</td>
					</tr>
					<tr>
						<td></td>
						<td><button id="submit" name="submit">Submit</button></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>

	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>