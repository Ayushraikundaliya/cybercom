<?php

require_once 'functions.php';

$updateblogpost = new Database();
$id = intval($_GET['id']);
$sql = $updateblogpost->fetchblogpost($id);

if(isset($_POST['submit']))
{
	$id1 = intval($_GET['id']);
	$title = $_POST['title'];
	$content = $_POST['content'];
	$url = $_POST['url'];
	$created = $_POST['created'];
	$category = $_POST['category'];
	$image = $_POST['image'];

	$sql1 = $updateblogpost->updateblogpost($title,$url,$content,$publishedat,$createdat,$updatedat,$image,$id);
	echo "<script>alert('Record Updated Successfully');</script>";
	echo "<script>window.location.href='blogpost.php';</script>";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Blog Post</title>
</head>
<body>

	<div class="uppdate-category">
		<form method="POST">
			<fieldset>
				<h1 style="text-align: center;">Update Blog Post</h1>	
				<table>
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" id="title" oninvalid="InvalidTitle(this);" oninput="InvalidTitle(this);"  required="required"></td>
					</tr>
					<tr>
						<td>Content</td>
						<td><textarea rows="5" cols="" name="content" id="content" oninvalid="InvalidContent(this);" oninput="InvalidContent(this);" value="<?php echo htmlentities($row['content']); ?>" required="required"></textarea></td>
					</tr>
					<tr>
						<td>URL</td>
						<td><input type="text" name="url" id="url" oninvalid="InvalidUrl(this);" oninput="InvalidUrl(this);"  required="required"></td>
					</tr>
					<tr>
						<td>Published At</td>
						<td><input style="width: 350px;" type="datetime-local" id="created" name="created" value="<?php echo htmlentities($row['created']); ?>" oninvalid="InvalidCreated(this);" oninput="InvalidCreated(this);" required="required"></td>
					</tr>
					<tr>
						<td>Category</td>
						<td>
							<select name="category" id="category" required="required" value="<?php echo htmlentities($row['category']); ?>" multiple style="overflow: hidden;height: 120px;">
								<option value="1">Lifestyle</option>
								<option value="2">Health</option>
								<option value="3">Education</option>
								<option value="4">Music</option>
								<option value="5">Arts</option>
								<option value="6">Dance</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Image</td>
						<td><input type="file" name="image" id="image" value="<?php echo htmlentities($row['image']); ?>" required="required"></td>
					</tr>
					<tr>
						<td></td>
						<td><button id="submit" name="submit">Submit</button></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>