<?php

if(isset($_POST['user_input']) && !empty($_POST['user_input']))
{
	if(isset($_POST['search']) && !empty($_POST['search']))
	{
		if(isset($_POST['replace']) && !empty($_POST['replace']))
		{
			$user_input = $_POST['user_input'];
			$search = $_POST['search'];
			$replace = $_POST['replace'];
			echo str_ireplace($search, $replace, $user_input);
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
	<hr>
	<form action="findandreplace.php" method="POST">
		<textarea rows="6" cols="30" name="user_input"></textarea><br><br>
		<label>Search</label><br>
		<input type="text" name="search"><br><br>
		<label>Replace</label><br>
		<input type="text" name="replace"><br><br>
		<input type="submit" name="Find and Replace">
	</form>

</body>
</html>