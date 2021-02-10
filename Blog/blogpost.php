<?php

require_once 'functions.php';

if(isset($_GET['del']))
{
	$id = $_GET['del'];
	$deleteblogpost = new Database();
	$sql = $deleteblogpost->deleteblogpost($id);
	if($sql)
	{
		echo "<script>alert('Record Deleted Successfully');</script>";
		echo "<script>window.location.href='blogpost.php';</script>";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog Post</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="header">
		<div class="header-right">
			<button style="background-color: lightgreen;"><a href="categorylist.php">Manage Category</a></button>
			<button style="background-color: lightblue;"><a href="">My Profile</a></button>
			<button style="background-color: lightpink;"><a href="login.php">Log Out</a></button>
		</div>
	</div>
	<div class="middle">
		<h1>Blog Posts</h1>
		<button style="background-color: lightgreen;height: 50px;width: 150px;"><a href="addblogpost.php">Add Blog Post</a></button>
		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>Post ID</th>
					<th>Category Name</th>
					<th>Title</th>
					<th>Published Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$displaycategory = new Database();
				$sql = $displaycategory->displaycategory();
				while ($row = mysqli_fetch_array($sql)) 
				{

				?>

				<tr>
					<td><?php echo htmlentities($row['id']); ?></td>
					<td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['content']?>"/></td>
					<td><?php echo htmlentities($row['title']); ?></td>
					<td><?php echo htmlentities($row['createdat']); ?></td>
					<td>
						<a href="addnewcategory.php?id=<?php echo htmlentities($row['id']); ?>">
							<button style="background-color: lightblue;width: 30px;height: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="contacts.php?del=<?php echo htmlentities($row['id']); ?>">
							<button style="background-color: red;width: 30px;height: 30px;" onclick="return confirm('Do you really want to delete?');">
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