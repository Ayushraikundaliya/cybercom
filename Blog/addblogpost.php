<?php

require_once 'functions.php';
require_once 'connection.php';

$insertblog = new Database();

$titleerr = "";
$contenterr = "";
$urlerr = "";
$metatitleerr = "";
$createderr = "";
$categoryerr = "";
$imageerr = "";
$error = 0;

if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['url']) && isset($_POST['created']) && isset($_POST['category']) && isset($_POST['image']))
{
	if(!empty($_POST['title']))
	{
		$title = $_POST['title'];
	}
	else
	{
		$titleerr = "Enter a title";
		$error++;
	}
	if(!empty($_POST['content']))
	{
		$content = $_POST['content'];
	}
	else
	{
		$contenterr = "Enter a content";
		$error++;
	}
	if(!empty($_POST['created']))
	{
		$created = $_POST['created'];
	}
	else
	{
		$createderr = "Enter a published date";
		$error++;
	}
	if(!empty($_POST['category']))
	{
		$category = $_POST['category'];
	}
	else
	{
		$categoryerr = "Select a category";
		$error++;
	}
	if(!empty($_POST['image']))
	{
		$image = $_POST['image'];
	}
	else
	{
		$imageerr = "Choose an image";
		$error++;
	}
	if(!empty($_POST['url']))
	{
		$url = $_POST['url'];
	}
	else
	{
		$urlerr = "Enter an url";
		$error++;
	}

	if($error == 0)
	{
		if(isset($_POST['submit']))
		{
			$query1 = "select * from blog_post where url='$url'";
			$res_query1 = mysqli_query($connect,$query1);
			$row =mysqli_fetch_assoc($res_query1);

			date_default_timezone_set('Asia/Kolkata');
			$createdat = date('y-m-d h:i:s');
			$updatedat = date('y-m-d h:i:s');

			if($row > 0)
			{
				echo "<script>alert('URL already taken');</script>";
				echo "<script>window.location.href='addblogpost.php';</script>";
			}
			else
			{	
				$user_id = $_GET['id'];
				$sql = $insertblog->insertblog($user_id,$title,$url,$content,$image,$publishedat,$createdat,$updatedat);
				if($sql)
				{
					echo "<script>alert('Record inserted Successfully');</script>";
					echo "<script>window.location.href='blogpost.php';</script>";
				}
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Blog Post</title>
</head>
<body>

	<div class="add-category">
		<form method="POST">
			<fieldset>
				<h1 style="text-align: center;">Add New Blog Post</h1>	
				<table>
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" id="title" oninvalid="InvalidTitle(this);" oninput="InvalidTitle(this);" value="<?php echo $titleerr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Content</td>
						<td><textarea rows="5" cols="" name="content" id="content" oninvalid="InvalidContent(this);" oninput="InvalidContent(this);" value="<?php echo $contenterr; ?>" required="required"></textarea></td>
					</tr>
					<tr>
						<td>URL</td>
						<td><input type="text" name="url" id="url" oninvalid="InvalidUrl(this);" oninput="InvalidUrl(this);" value="<?php echo $urlerr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Published At</td>
						<td><input style="width: 350px;" type="datetime-local" id="created" name="created" value="<?php echo $createderr; ?>" oninvalid="InvalidCreated(this);" oninput="InvalidCreated(this);" required="required"></td>
					</tr>
					<tr>
						<td>Category</td>
						<td>
							<select name="category" id="category" required="required" value="<?php echo $categoryerr; ?>" multiple style="overflow: hidden;height: 120px;">
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
						<td><input type="file" name="image" id="image" required="required"></td>
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
