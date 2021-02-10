<?php

require_once 'functions.php';
require_once 'connection.php';

$insertcategory = new Database();

$titleerr = "";
$contenterr = "";
$urlerr = "";
$metatitleerr = "";
$categoryerr = "";
$imageerr = "";
$error = 0;

if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['url']) && isset($_POST['metatitle']) && isset($_POST['category']) && isset($_POST['image']))
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
	if(!empty($_POST['metatitle']))
	{
		$metatitle = $_POST['metatitle'];
	}
	else
	{
		$metatitleerr = "Enter a meta title";
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
			$query1 = "select * from category where url='$url'";
			$res_query1 = mysqli_query($connect,$query1);
			$row =mysqli_fetch_assoc($res_query1);

			date_default_timezone_set('Asia/Kolkata');
			$createdat = date('y-m-d h:i:s');
			$updatedat = date('y-m-d h:i:s');

			if($row > 0)
			{
				echo "<script>alert('URL already taken');</script>";
				echo "<script>window.location.href='addnewcategory.php';</script>";
			}
			else
			{	
				$sql = $insertcategory->insertcategory($category,$title,$metatitle,$url,$content,$createdat,$updatedat,$image);
				if($sql)
				{
					echo "<script>alert('Record inserted Successfully');</script>";
					echo "<script>window.location.href='categorylist.php';</script>";
				}
			}
		}
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Category</title>
</head>
<body>

	<div class="add-category">
		<form method="POST">
			<fieldset>
				<h1 style="text-align: center;">Add New Category</h1>	
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
						<td>Meta Title</td>
						<td><input type="text" name="metatitle" id="metatitle" oninvalid="InvalidMetaTitle(this);" oninput="InvalidMetaTitle(this);" value="<?php echo $metatitleerr; ?>" required="required"></td>
					</tr>
					<tr>
						<td>Category</td>
						<td>
							<select name="category" id="category" required="required"  value="<?php echo $categoryerr; ?>">
								<option value=""></option>
								<option value="1">Lifestyle</option>
								<option value="2">Health</option>
								<option value="3">Education</option>
								<option value="4">Arts</option>
								<option value="5">Dance</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Image</td>
						<td><input type="file" name="image" id="image" required="required" value="<?php echo $imageerr; ?>"></td>
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
