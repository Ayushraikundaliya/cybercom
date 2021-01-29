<?php

if(isset($_POST['pwd']))
{
	$pwd = $_POST['pwd'];
	if(!empty($_POST['pwd']))
	{
		echo "Password Entered";
	}
	else{
		echo "Password Not Entered";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="post_method.php" method="POST">
		<label>Password</label>
		<input type="password" name="pwd"><br>
		<input type="submit" value="submit">
	</form>

</body>
</html>