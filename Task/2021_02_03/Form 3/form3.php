<?php

require "connection.php";

$fnameerr ="";
$lnameerr ="";
$dateerr ="";
$gendererr = "";
$countryerr = "";
$emailerr = "";
$phoneerr = "";
$passworderr = "";
$cpassworderr = "";
$agreeerr = "";
$error = 0;

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(!empty($_POST['fname']))
	{
		$fname = $_POST['fname'];
	}
	else
	{
		$fnameerr = "Enter your first name";
		$error++;
	}
	if(!empty($_POST['lname']))
	{
		$lname = $_POST['lname'];
	}
	else
	{
		$lnameerr = "Enter your last name";
		$error++;
	}
	if(!empty($_POST['month']) || !empty($_POST['day']) || !empty($_POST['year']))
	{
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
	}
	else
	{
		$dateerr = "Enter your birth date";
		$error++;
	}
	if(!empty($_POST['gender']))
	{
		$gender = $_POST['gender'];
	}
	else
	{
		$gendererr = "Select your Gender";
		$error++;
	}
	if(!empty($_POST['country']))
	{
		$country = $_POST['country'];
	}
	else
	{
		$countryerr = "Select Your country"; 
		$error++;
	}
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
	}
	else
	{
		$emailerr = "Enter an email";
		$error++;
	}
	if(!empty($_POST['phone']))
	{
		$phone = $_POST['phone'];
	}
	else
	{
		$phoneerr = "Enter your phone no.";
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
	if(!empty($_POST['cpassword']))
	{
		$cpassword = $_POST['cpassword'];
	}
	else
	{
		$cpassworderr = "Enter your confirm password";
		$error++;
	}
	if(!empty($_POST['agree']))
	{
		$agree = $_POST['agree'];
	}
	else
	{
		$agreeerr = "Please accept the agreement";
		$error++;
	}
}
if(isset($_POST['submit']))
{
	if($error == 0)
	{
		$query1 = "select * from signup where email='$email'";
		$res_query1 = mysqli_query($con,$query1);
		$row =mysqli_fetch_assoc($res_query1);
		$date = $year."-".$month."-".$day;

		if($row > 0)
		{
			echo "E-mail already taken.<br>";
		}
		else
		{
			$query = "insert into signup(fname,lname,date,gender,country,email,phone,password) values ('$fname','$lname','$date','$gender','$country','$email','$phone','$password')";
			if(mysqli_query($con,$query))
			{
				echo "Hey! ".$fname." ".$lname."<br>";
				echo "Your dob is ".$day." ".$month." ".$year."<br>";
				echo "Your Gender is ".$gender."<br>";
				echo "Your Country is ".$country."<br>";
				echo "Your E-mail is ".$email."<br>";
				echo "Your Phone no. is ".$phone."<br>";	
			}
			else
			{
				echo "Form Not Submitted";
			}

		}
	}
	else{	
		echo "There is an error. Please check it.";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Form 3</title>
	<link rel="stylesheet" type="text/css" href="form3.css">
</head>
<body>

	<form action="form3.php" method="POST" name="signup" onsubmit="return formVal();">
		<div class="header">
			<table>
				<tr>
					<td>SIGN UP</td>
				</tr>
			</table>
		</div>

		<div class="body">
			<table>  
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" id="fname" name="fname"  placeholder="Enter First Name">
						<span id="spanfname"></span>
						<span><?php echo $fnameerr;?></span>
					</td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>
						<input type="text" name="lname" id="lname" placeholder="Enter Last Name">
						<span id="spanlname"></span>
						<span><?php echo $lnameerr;?></span>
					</td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<td>
						<select id="day" name="day">
							<option>Day</option>
							<option value='01'>01</option>
							<option value='02'>02</option>
							<option value='03'>03</option>
							<option value='04'>04</option>
							<option value='05'>05</option>
							<option value='06'>06</option>
							<option value='07'>07</option>
							<option value='08'>08</option>
							<option value='09'>09</option>
							<option value='10'>10</option>
							<option value='11'>11</option>
							<option value='12'>12</option>
							<option value='13'>13</option>
							<option value='14'>14</option>
							<option value='15'>15</option>
							<option value='16'>16</option>
							<option value='17'>17</option>
							<option value='18'>18</option>
							<option value='19'>19</option>
							<option value='20'>20</option>
							<option value='21'>21</option>
							<option value='22'>22</option>
							<option value='23'>23</option>
							<option value='24'>24</option>
							<option value='25'>25</option>
							<option value='26'>26</option>
							<option value='27'>27</option>
							<option value='28'>28</option>
							<option value='29'>29</option>
							<option value='30'>30</option>
							<option value='31'>31</option>
						</select>
						<select id="month" name="month">
							<option>Month</option>
							<option value='01'>January</option>
							<option value='02'>February</option>
							<option value='03'>March</option>
							<option value='04'>April</option>
							<option value='05'>May</option>
							<option value='06'>June</option>
							<option value='07'>July</option>
							<option value='08'>August</option>
							<option value='09'>September</option>
							<option value='10'>October</option>
							<option value='11'>November</option>
							<option value='12'>December</option>
						</select>
						<select id="year" name="year">
							<option>Year</option>
							<option value="2020">2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
						</select>
						<span id="spandate"></span>
						<span><?php echo $dateerr;?></span>
					</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" id="gender" name="gender" value="Male">Male
						<input type="radio" id="gender" name="gender" value="Female">Female
						<span id="spangender"></span>
						<span><?php echo $gendererr;?></span>
					</td>
				</tr>
				<tr>
					<td>Country</td>
					<td>
						<select id="country" name="country">
							<option value="">Country</option>
							<option value="India">India</option>
							<option value="Australia">Australia</option>
							<option value="China">China</option>
							<option value="Japan">Japan</option>
							<option value="USA">USA</option>
						</select>
						<span id="spancountry"></span>
						<span><?php echo $countryerr;?></span>
					</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>
						<input type="email" name="email" id="email" placeholder="Enter E-mail">
						<span id="spanemail"></span>
						<span><?php echo $emailerr;?></span>
					</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>
						<input type="text" name="phone" id="phone" placeholder="Enter Phone">
						<span id="spanphone"></span>
						<span><?php echo $phoneerr;?></span>
					</td>
				</tr>
				<tr>
					<td>Passsword</td>
					<td>
						<input type="password" id="password" name="password">
						<span id="spanpassword"></span>
						<span><?php echo $passworderr;?></span>
					</td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td>
						<input type="password" id="cpassword" name="cpassword">
						<span id="spancpassword"></span>
						<span><?php echo $cpassworderr;?></span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="radio" id="agree" name="agree" value="agree">I accept this agreement
						<span id="spanagree"></span>
						<span><?php echo $agreeerr;?></span>
					</td>
				</tr>
			</table>
		</div>

		<div class="footer">
			<table>
				<tr>
					<td>
						<input type="submit" name="submit" value="Submit">
						<input type="reset" name="reset">
					</td>
				</tr>
			</table>
		</div>
		
	</form>

	<script type="text/javascript" src="form3.js"></script>

</body>
</html>