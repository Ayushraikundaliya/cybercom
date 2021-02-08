<?php

require 'header.php';
require 'connection.php';

$update = new Database();
$id = intval($_GET['id']);
$sql = $update->fetch($id);

if(isset($_POST['update']))
	{
		$id1 = intval($_GET['id']);
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$title = $_POST['title'];
		$created = $_POST['created'];

		$sql1 = $update->update($name,$email,$phone,$title,$created,$id1);
		echo "<script>alert('Record Updated Successfully');</script>";
		echo "<script>window.location.href='contacts.php';</script>";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="updates">
		<h1>Update Contact #<?php echo $id; ?></h1>
		<hr>

	<?php

	while ($row = mysqli_fetch_array($sql)) 
	{

	?>

	<form method="POST">
			<table>
				<tr>
					<td>
						<label for="id">ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
						<label for="name">NAME</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="id" id="id" value="auto" size="50" disabled>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="name" id="name" size="50" oninvalid="InvalidName(this);" oninput="InvalidName(this);" value="<?php echo htmlentities($row['name']); ?>" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="email">EMAIL</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
						<label for="phone">PHONE</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="email" name="email" id="email" size="50" value="<?php echo htmlentities($row['email']); ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="InvalidEmail(this);" oninput="InvalidEmail(this);" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="phone" id="phone" size="50" value="<?php echo htmlentities($row['phone']); ?>" oninvalid="InvalidPhone(this);" oninput="InvalidPhone(this);" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="title">TITLE</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="created">CREATED</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="title" id="title" size="50" oninvalid="InvalidTitle(this);" value="<?php echo htmlentities($row['title']); ?>" oninput="InvalidTitle(this);" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input style="width: 350px;" type="datetime-local" id="created" name="created" value="<?php echo htmlentities(strtotime($row['created'])); ?>" oninvalid="InvalidCreated(this);" oninput="InvalidCreated(this);" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td><input style="background-color: #00e673; width:100px;color: white;" type="submit" name="update" value="Update"></td>
				</tr>
			</table>
		</form>
	</div>


	<?php } ?>

</body>
</html>