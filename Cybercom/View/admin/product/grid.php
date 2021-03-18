<?php


$products = $this->getProducts();

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
		<h1>Products</h1>
		<hr>
		<button onclick="location.href='<?php echo $this->getUrl('form',null,null,true); ?>'"><a href="<?php echo $this->getUrl('form','product',null,true); ?>"></a>Create Products</button>

		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>ProductId</th>
					<th>SKU</th>
					<th>Name</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Quantity</th>
					<th>Description</th>
					<th>CreatedDate</th>
					<th>UpdatedDate</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $key) {
				
				 ?>
				<tr>
					<td><?php echo htmlentities($key->productId); ?></td>
					<td><?php echo htmlentities($key->sku); ?></td>
					<td><?php echo htmlentities($key->name); ?></td>
					<td><?php echo htmlentities($key->price); ?></td>
					<td><?php echo htmlentities($key->discount); ?></td>
					<td><?php echo htmlentities($key->quantity); ?></td>
					<td><?php echo htmlentities($key->description); ?></td>
					<td><?php echo htmlentities($key->createdDate); ?></td>
					<td><?php echo htmlentities($key->updatedDate); ?></td>
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
						<a href="<?php echo $this->getUrl('form',Null,['productId' => $key->productId]); ?>">
							<button style="background-color: lightblue;width: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="<?php echo $this->getUrl('delete',Null,['productId' => $key->productId]); ?>">
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