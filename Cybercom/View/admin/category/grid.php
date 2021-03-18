<?php

$categories = $this->getCategories();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="contact">
		<h1>Category</h1>
		<hr>
		<button onclick="location.href='<?php echo $this->getUrl('form',null,null,true); ?>'"><a href="<?php echo $this->getUrl('form',null,null,true); ?>"></a>Create Catrgories</button>

		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>CategoryId</th>
					<th>Name</th>
					<th>ParentId</th>
					<th>Description</th>
					<th>PathId</th>
					<th>Status</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php

				foreach ($categories as $key) {

				?>
				<tr>
					<td><?php echo htmlentities($key->categoryId); ?></td>
					<td><?php echo htmlentities($key->name); ?></td>
					<td><?php echo htmlentities($key->parentId); ?></td>
					<td><?php echo htmlentities($key->description); ?></td>
					<td><?php echo htmlentities($key->pathId); ?></td>
					<td>
					<?php if($key->status == 1) { ?>
						<a href='' >
							<button style="background-color: lightgreen;width: 100px;">
								Active
							</button>
						</a>
						<?php
					} 
					
					else { ?>
					<a href="<?php  ?>">
							<button style="background-color: lightpink;width: 100px;">
								Deactive
							</button>
						</a>
					<?php } ?>
					</td>
					<td>
						<a href="<?php echo $this->getUrl('form',Null,['id' => $key->categoryId]); ?>">
							<button style="background-color: lightblue;width: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="<?php echo $this->getUrl('delete',Null,['id' => $key->categoryId]); ?>">
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