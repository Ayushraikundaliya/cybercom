<?php

require 'header.php';
require_once 'connection.php';

$insertdata = new Database();

$nameerr ='';
$emailerr = '';
$phoneerr = '';
$titleerr = '';
$createderr = '';
$error = 0;

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['title']) && isset($_POST['created']))
{
	if(!empty($_POST['name']))
	{
		$name = $_POST['name'];
	}
	else
	{
		$nameerr = "Please enter your Name";
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
	if(!empty($_POST['phone']))
	{
		$phone = $_POST['phone'];
	}
	else
	{
		$phoneerr = "Please enter your Phone number";
		$error++;
	}
	if(!empty($_POST['title']))
	{
		$title = $_POST['title'];
	}
	else
	{
		$titleerr = "Please enter your Title";
		$error++;
	}
	if(!empty($_POST['created']))
	{
		$created = $_POST['created'];
	}
	else
	{
		$createderr = "Please enter Date and Time";
		$error++;
	}

	if($error == 0)
	{
		if(isset($_POST['update']))
		{
			$sql = $insertdata->insert($name,$email,$phone,$title,$created);
			if($sql)
			{
				echo "<script>alert('Record inserted Successfully');</script>";
				echo "<script>window.location.href='contacts.php'</script>";
			}
		}
	}
}




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="create">
		<h1>Create Contact</h1>
		<hr>

		<form method="POST" onsubmit="return formVal();">
			<table>
				<tr>
					<td>
						<label for="id">ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
						<label for="name">NAME</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="id" id="id" value="auto" size="50" disabled>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="name" id="name" size="50" oninvalid="InvalidName(this);" oninput="InvalidName(this);" value="<?php echo $nameerr; ?>" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="email">EMAIL</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
						<label for="phone">PHONE</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="email" name="email" id="email" size="50" value="<?php echo $emailerr; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="InvalidEmail(this);" oninput="InvalidEmail(this);" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="phone" id="phone" size="50" value="<?php echo $phoneerr; ?>" oninvalid="InvalidPhone(this);" oninput="InvalidPhone(this);" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="title">TITLE</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="created">CREATED</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="title" id="title" size="50" oninvalid="InvalidTitle(this);" value="<?php echo $titleerr; ?>" oninput="InvalidTitle(this);" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input style="width: 350px;" type="datetime-local" id="created" name="created" value="<?php echo $createderr; ?>" oninvalid="InvalidCreated(this);" oninput="InvalidCreated(this);" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td><input style="background-color: #00e673; width:100px;color: white;" type="submit" name="update" value="Create"></td>
				</tr>
			</table>
		</form>
	</div>

	<script type="text/javascript" src="js/validation.js"></script>

</body>
</html>