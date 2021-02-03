<?php

require "connection.php";

$nameerr = "";
$passworderr = "";
$gendererr = "";
$addresserr = "";
$dateerr = "";
$gameerr = "";
$mserr = "";
$agreeerr = "";
$error = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(!empty($_POST['name']))
	{
		$name = $_POST['name'];
	}
	else
	{
		$nameerr = "Enter your name";
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
	if(!empty($_POST['gender']))
	{
		$gender = $_POST['gender'];
	}
	else
	{
		$gendererr = "Select your Gender";
		$error++;
	}
	if(!empty($_POST['address']))
	{
		$address = $_POST['address'];
	}
	else
	{
		$addresserr = "Enter your address";
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
	if(!empty($_POST['game']))
	{
		$game = $_POST['game'];
	}
	else
	{
		$gameerr = "Select atleast one game";
		$error++;
	}
	if(!empty($_POST['ms']))
	{
		$ms = $_POST['ms'];
	}
	else
	{
		$mserr = "Select your martial status";
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
		$query1 = "select * from userform where name='$name'";
		$res_query1 = mysqli_query($con,$query1);
		$row =mysqli_fetch_assoc($res_query1);
		$g = "";
		foreach ($game as $games) {
			$g .= $games.",";
		}
		$date = $year."-".$month."-".$day;

		if($row > 0)
		{
			echo "Name already taken.<br>";
		}
		else
		{
			$query = "insert into userform (name,password,gender,address,date,game,ms) values ('$name','$password','$gender','$address','$date','$g','$ms')";
			if(mysqli_query($con,$query))
			{
				echo "Form Submitted<br><br>";
				echo "Hey! ".$name."<br>";
				echo "Your Gender is ".$gender."<br>";
				echo "Your Address is ".$address."<br>";
				echo "Your dob is ".$day." ".$month." ".$year."<br>";
				echo "Game you've selected is <br>";
				foreach ($game as $value) {
					echo $value."<br>";
				}
				echo "Your Maritial status is ".$ms."<br>";
			}
			else
			{
				echo "Form Not Submitted";
			}

		}
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Form 2</title>
	<link rel="stylesheet" type="text/css" href="form2.css">
</head>
<body>

	<form method="POST" name="userform" onsubmit="return formVal();">
		<fieldset>
			<legend>User Form</legend>
			<table>
				<tr>
					<td>
						<ul>
							<li>FIRST NAME</li>
						</ul>
					</td>
					<td>
						<input type="text" id="name" name="name">
						<span id="spanname"></span>
						<span><?php echo $nameerr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>PASSWORD</li>
						</ul>
					</td>
					<td>
						<input type="password" id="password" name="password">
						<span id="spanpassword"></span>
						<span><?php echo $passworderr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>GENDER</li>
						</ul>
					</td>
					<td>
						<input type="radio" id="gender" name="gender" value="Male">Male
						<input type="radio" id="gender" name="gender" value="Female">Female
						<span id="spangender"></span>
						<span><?php echo $gendererr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>ADDRESS</li>
						</ul>
					</td>
					<td>
						<textarea id="address" name="address" rows="10" cols="30"></textarea>
						<span id="spanaddress"></span>
						<span><?php echo $addresserr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>D.O.B</li>
						</ul>
					</td>
					<td>
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
					<td>
						<ul>
							<li>SELECT GAMES</li>
						</ul>
					</td>
					<td>
						<input type="checkbox" id="game[]" name="game[]" value="hockey">Hockey
						<input type="checkbox" id="game[]" name="game[]" value="football">Football
						<input type="checkbox" id="game[]" name="game[]" value="badminton">Badminton
						<input type="checkbox" id="game[]" name="game[]" value="cricket">Cricket
						<input type="checkbox" id="game[]" name="game[]" value="volleyball">Volleyball
						<span id="spangame"></span>
						<span><?php echo $gameerr;?></span>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>MARITAL STATUS</li>
						</ul>
					</td>
					<td>
						<input type="radio" id="ms" name="ms" value="Married">Married
						<input type="radio" id="ms" name="ms" value="Unmarried">Unmarried
						<span id="spanms"></span>
						<span><?php echo $mserr;?></span>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<input type="submit" name="submit" value="Submit">
						<input type="reset" name="reset">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="radio" id="agree" name="agree">I accept this agreement
						<span id="spanagree"></span>
						<span><?php echo $agreeerr;?></span>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

	<script type="text/javascript" src="form2.js"></script>

</body>
</html>