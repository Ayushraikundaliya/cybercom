<?php

if(isset($_FILES['file']))
{
	$name = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$extension = strtolower(substr($name, strpos($name, '.')+ 1));
	$type = $_FILES['file']['type'];
	if(!empty($name))
	{
		if (($extension == 'jpg' || $extension == 'jpeg'))
		{
			$location = 'Uploads/';
			if(move_uploaded_file($tmp_name, $location.$name))
			{
				echo "Uploaded";
			}
			else
			{
				echo "Not Uploaded";
			}
		}
		else
		{
			echo "File must be jpg/jpeg";
		}
	}
	else
	{
		echo "Upload your File";
	}
}



?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="upload_files.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="file"><br><br>
		<input type="submit" value="Submit">
	</form>

</body>
</html>