<?php



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

	<table  width="100%">
		<tbody>
			<tr>
				<td height="100px" colspan="3">
				<?php $this->getChild('header')->render(); ?>
				</td>
			</tr>
			<tr>
				<td height="500px" width="150px">
					<?php $this->getChild('left')->render(); ?>
				</td>
				<td>
					<?php  

					$this->getChild('content')->render(); 

					?>
				</td>
			</tr>
			<tr>
				<td height="100px" colspan="3">
					<?php $this->getChild('footer')->render(); ?>
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>