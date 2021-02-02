<?php

$nameerr = "";
$emailerr = "";
$subjecterr = "";
$messageerr = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(!empty($_POST['name']))
	{
		$name = $_POST['name'];
	}
	else
	{
		$nameerr = "Name is required";
	}
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else
	{
		$emailerr = "Enter an email";
	}
	if(!empty($_POST['subject']))
	{
		$subject = $_POST['subject'];
	}
	else
	{
		$subject = "Enter a subject";
	}
	if(!empty($_POST['message']))
	{
		$message = $_POST['message'];
	}
	else
	{
		$messageerr = "Enter your message";
	}
}
if(isset($_POST['submit']))
{
	echo "Hey! ".$name."<br>";
	echo "Your E-mail is ".$email."<br>";
	echo "Your Subject is ".$subject."<br>";
	echo "Your message is ".$message."<br>";	
}	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Form 4</title>
	<link rel="stylesheet" type="text/css" href="form4.css">
</head>
<body>

	<form action="form4.php" method="POST" name="contactus" onsubmit="return formVal();">
		<div class="header">
			<p>CONTACT US</p>
		</div>
		<div class="body">
			<table>
				<tr>
					<td>
						<input type="text" name="name" id="name" placeholder="Name....">
						<span id="spanname"></span>
						<span><?php echo $nameerr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="email" name="email" id="email" placeholder="Email....">
						<span id="spanemail"></span>
						<span><?php echo $emailerr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="subject" id="subject" placeholder="Subject....">
						<span id="spansubject"></span>
						<span><?php echo $subjecterr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<textarea placeholder="Message...." id="message" name="message"></textarea>
						<span id="spanmessage"></span>
						<span><?php echo $messageerr;?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="footer">
			<input type="submit" name="submit" id="submit" class="button" value="Send Message">	
		</div>
	</form>

	<script type="text/javascript" src="form4.js"></script>

</body>
</html>