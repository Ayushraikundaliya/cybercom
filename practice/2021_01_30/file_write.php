<?php



if(isset($_POST['name']))
{
	$name = $_POST['name'];
	if(!empty($_POST['name']))
	{
		$file = fopen('name.txt', 'w');
		fwrite($file, $name);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="file_write.php" method="POST">
		Name : <input type="name" name="name"><br>
		<input type="submit" value="Submit">
	</form>

</body>
</html>