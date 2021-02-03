<?php

require "connection.php";

$nameerr="";
$passworderr ="";
$addresserr = "";
$ageerr ="";
$gendererr = "";
$fileerr ="";
$gameerr = "";
$error = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['file']) && isset($_POST['game'])) 
	{
		if(!empty($_POST['name']))
		{
			$name = $_POST['name'];
		}
		else
		{
			$nameerr = "Name is required";
			$error++;
		}

		if(!empty($_POST['password']))
		{
			$password = md5($_POST['password']);
		}
		else
		{
			$passworderr = "Password is required";
			$error++;
		}

		if (!empty($_POST['address']))
		{
			$address = $_POST['address'];
		}
		else
		{
			$addresserr = "Address is required";
			$error++;
		}

		if(!empty($_POST['age']))
		{
			$age = $_POST['age'];
		}
		else
		{
			$ageerr = "Select Your Age"; 
			$error++;
		}
		if (!empty($_POST['gender'])) 
		{
			$gender = $_POST['gender'];
		}
		else
		{
			$gendererr = "Select a gender";
			$error++;
		}
		
		if(!empty($_POST['file']))
		{
			$file = $_POST['file'];
		}
		else
		{
			$fileerr = "Select a file";
			$error++;
		}

		if(!empty($_POST['game']))
		{
			$game = $_POST['game'];
		}
		else
		{
			$gameerr = "Select atlease one game";
			$error++;
		}
	}
}

if(isset($_POST['submit']))
{
	if ($error == 0) 
	{
		$query1 = "select * from userform where name='$name'";
		$res_query1 = mysqli_query($con,$query1);
		$row =mysqli_fetch_assoc($res_query1);
		$g = "";
		foreach ($game as $games) {
			$g .= $games.",";
		}
		
		if($row > 0)
		{
			echo "Name already taken.<br>";
		}
		else
		{
			$query = "insert into userform (name,password,address,game,gender,age,file) values ('$name','$password','$address','$g','$gender','$age','$file')";
			if(mysqli_query($con,$query))
			{
				echo "Form Submitted<br><br>";
				echo "Hey! ".$name."<br>";
				echo "Your Address is ".$address."<br>";
				echo "Your age is ".$age."<br>";
				echo "Your Gender is ".$gender."<br>";
				echo "Your File name is ".$file."<br>";
				echo "Game you've selected is <br>";
				foreach ($game as $value) {
					echo $value."<br>";
				}
			}
			else
			{
				echo "Form Not Submitted";
			}

		}
	}
	else
	{
		echo "There is an Error. Please Check it.";
	}
}




?>


<!DOCTYPE html>
<html>
<head>
	<title>Form 1</title>
	<link rel="stylesheet" type="text/css" href="form1.css">
</head>
<body>

	<h1>User Form</h1>

	<form  method="POST" name="userform"  onsubmit="return formVal();">
		<table>
			<tr>
				<td>Enter Name</td>
				<td>
					<input type="name" id="name" name="name">
					<span id="spanname"></span>
					<span><?php echo $nameerr;?></span>
				</td>
			</tr>
			<tr>
				<td>Enter Password</td>
				<td>
					<input type="password" id="password" name="password">
					<span id="spanpassword"></span>
					<span><?php echo $passworderr;?></span>
				</td>
			</tr>
			<tr>
				<td>Enter Address</td>
				<td>
					<textarea id="address" name="address" rows="5" cols="30"></textarea>
					<span id="spanaddress"></span>
					<span><?php echo $addresserr;?></span>
				</td>
			</tr>
			<tr>
				<td>Select Game</td>
				<td>
					<input type="checkbox" id="game[]" name="game[]" value="hockey">Hockey<br>
					<input type="checkbox" id="game[]" name="game[]" value="football">Football<br>
					<input type="checkbox" id="game[]" name="game[]" value="badminton">Badminton<br>
					<input type="checkbox" id="game[]" name="game[]" value="cricket">Cricket<br>
					<input type="checkbox" id="game[]" name="game[]" value="volleyball">Volleyball
					<span id="spangame"></span>
					<span><?php echo $gameerr;?></span>

				</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="gender" id="gender" value="Male">Male
					<input type="radio" name="gender" id="gender" value="Female">Female
					<span id="spangender"></span>
					<span><?php echo $gendererr;?></span>
				</td>
			</tr>
			<tr>
				<td>Select Your Age</td>
				<td>
					<select name="age" id="age">
						<option value="select">Select</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
					</select>
					<span id="spanage"></span>
					<span class = "error"><?php echo $ageerr;?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="file" name="file" id="file">
					<span id="spanfile"></span>
					<span><?php echo $fileerr;?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="reset" name="reset">
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
	<script type="text/javascript" src="form1.js"></script>

</body>
</html>