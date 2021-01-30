<?php

$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];

if(isset($name))
{
	if(!empty($name))
	{
		$location = 'files/';
		if (move_uploaded_file($tmp_name, $location.$name)) {
			echo "Uploaded";
		}
		else
		{
			echo "Not Uploaded";
		}
	}
	else
	{
		echo "Please Choose a File";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="upload_file.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="file"><br><br>
		<input type="submit" value="Submit">
	</form>

</body>
</html>