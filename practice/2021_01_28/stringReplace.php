<?php

$search = array('Going','Great');
$replace = array('Not','Good');

if(isset($_POST['user_input']) && !empty($_POST['user_input'])){
	$user_input = $_POST['user_input'];
	echo str_ireplace($search, $replace, $user_input);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<hr>
	<form action="stringReplace.php" method="POST">
		<textarea name="user_input" rows="6" cols="30"></textarea><br><br>
		<input type="submit" name="Submit">
	</form>

</body>
</html>