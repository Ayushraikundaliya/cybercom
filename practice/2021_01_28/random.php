<?php

if(isset($_POST['roll']))
{
	$roll = rand(1,6);
	echo $roll;

}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="random.php" method="POST">
		<input type="submit" name="roll" value="Roll Dice" >
	</form>

</body>
</html>