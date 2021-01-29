<?php

$name = "";
$email = "";
$gender = "";
$Nameerr = "";
$Gendererr = "";
$emailerr = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(!empty($_POST['name']))
	{
		$name = $_POST['name'];
	}
	else{
		$Nameerr = "Name is required";
	}

	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else{
		$emailerr = "Email is required";
	}
	if(!empty($_POST['gender']))
	{
		$gender = $_POST['gender'];
	}
	else{
		$Gendererr = "Gender is required";
	}

	$course = $_POST['course'];
	$class = $_POST['class'];	


}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Registration Form</h1>

	<div class="error">
		<p>*Required Field</p>
		<p>*You must agree to terms.</p>
	</div>

	<form action="form.php" method="POST">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name">
					<span class="error">* <?php echo $Nameerr; ?></span>
				</td>
			</tr>
			<tr>
				<td>E-mail:</td>
				<td><input type="email" name="email">
					<span class="error">* <?php echo $emailerr; ?></span>
				</td>
			</tr>
			<tr>
				<td>Time:</td>
				<td><input type="time" name="course"></td>
			</tr>
			<tr>
				<td>Classes:</td>
				<td><textarea name="class"></textarea></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
					<input type="radio" name="gender" value="Female">Female
					<input type="radio" name="gender" value="Male">Male
					<span class="error">* <?php echo $Gendererr;  ?></span>
				</td>
			</tr>
			<tr>
				<td>Select:</td>
				<td>
					<select name="subject[]" size="4">
						<option value = "Android">Android</option>
                     	<option value = "Java">Java</option>
                     	<option value = "C#">C#</option>
                     	<option value = "Data Base">Data Base</option>
                     	<option value = "Hadoop">Hadoop</option>
                     	<option value = "VB script">VB script</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Agree:</td>
				<td><input type="checkbox" name="check" value="1">
				
				<?php

				if(!isset($_POST['check']))
				{ ?>

				<span class="error">* <?php echo "You must agree the terms.";?></span>
				<?php
				
				}

				?>
			</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>

	<h1>Your Given Values are:</h1>

	<?php
		echo "<p>Your Name is $name</p>";
		echo "<p>Your Email Address is $email</p>";
		echo "<p>Your Class Time at $course</p>";
		echo "<p>Your Class info $class</p>";
		echo "<p>Your Gender is $gender</p>";
	?>

</body>
</html>