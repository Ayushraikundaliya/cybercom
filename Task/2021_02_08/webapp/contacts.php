<?php

require 'header.php';
require_once 'connection.php';

if(isset($_GET['del']))
{
	$id = $_GET['del'];
	$delete = new Database();
	$sql = $delete->delete($id);
	if($sql)
	{
		echo "<script>alert('Record Deleted Successfully');</script>";
		echo "<script>window.location.href='contacts.php';</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="contact">
		<h1>Read Contacts</h1>
		<hr>
		<button onclick="location.href='create.php'"><a href="create.php"></a>Create Contacts</button>

		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Title</th>
					<th>Created</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php

				$display = new Database();
				$sql = $display->display();
				while ($row = mysqli_fetch_array($sql)) 
				{

				?>

				<tr>
					<td><?php echo htmlentities($row['id']); ?></td>
					<td><?php echo htmlentities($row['name']); ?></td>
					<td><?php echo htmlentities($row['email']); ?></td>
					<td><?php echo htmlentities($row['phone']); ?></td>
					<td><?php echo htmlentities($row['title']); ?></td>
					<td><?php echo htmlentities($row['created']); ?></td>
					<td>
						<a href="update.php?id=<?php echo htmlentities($row['id']); ?>">
							<button style="background-color: lightblue;width: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="contacts.php?del=<?php echo htmlentities($row['id']); ?>">
							<button style="background-color: red;width: 30px;" onclick="return confirm('Do you really want to delete?');">
								<i class="fa fa-trash-o"></i>
							</button>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>
</body>
</html>