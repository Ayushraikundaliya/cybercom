<?php

session_start();


if(!isset($_SESSION['username']))
{
	header('location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Log out</title>
</head>
<body>

	<?php if(isset($_SESSION['username'])) { ?>
		<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p><a href="login.php">logout</a></p>
		<p><a href="register.php">Register</a></p>
	<?php } ?>

</body>
</html>