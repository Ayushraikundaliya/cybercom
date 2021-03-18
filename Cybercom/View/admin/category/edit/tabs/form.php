<?php

$category = $this->getCategory();
$categoryOptions =$this->getCategoriesOptions();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="create">
		<h1>Update Category</h1>
		<hr>

		<form action="<?php echo $this->getUrl('save',null,['id'=>$category->categoryId]); ?>" method="POST">
			<table>
				<tr>
					<td>
						<label for="categoryId">CATEGORY ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;
						<label for="name">NAME</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="category[categoryId]" id="categoryId" size="50" disabled="disabled">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="category[name]" id="name" size="50" value="<?php echo $category->name; ?>"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="status">STATUS (0 or 1)</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
						<label for="description">DESCRIPTION</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="category[status]" id="status" size="50" value="<?php echo $category->status; ?>" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="category[description]" required="required" value="<?php echo $category->description; ?>" size="50">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>

				<tr>
					<td>
						<label for="parentId">STATUS (0 or 1)</label>
					</td>
				</tr>
				<tr>
					<td>
						<select name="category[parentId]" id="parentId">
                			<?php foreach ($categoriesOptions as $categoryId => $pathId) : ?>
                    			<option value="<?php echo $categoryId ?>" <?php if ($categoryId == $category->parentId) : echo 'selected' ?><?php endif; ?>><?php echo $pathId ?></option>
                			<?php endforeach; ?>
            			</select>
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>	
				<tr>
					<td><input style="background-color: #00e673; width:100px;color: white;" type="submit" name="submit" value="Create"></td>
				</tr>
			</table>
		</form>
	</div>

</body>
</html>