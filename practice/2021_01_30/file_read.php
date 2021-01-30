<?php

if(isset($_POST['name']))
{
	$name = $_POST['name'];
	if(!empty($_POST['name']))
	{
		$file = fopen('name.txt', 'a');
		fwrite($file, $name."\n");
		fclose($file);

		echo "Current names :";
		$count = 1;
		$readin = file('name.txt');
		$namecount = count($readin);
		foreach ($readin as $names) {
			echo trim($names);
			if($count<$namecount)
			{
				echo ", ";
			}
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

	<form action="file_read.php" method="POST">
		Name : <input type="name" name="name"><br>
		<input type="submit" value="Submit">
	</form>

</body>
</html>