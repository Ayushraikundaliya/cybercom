<?php

$product = $this->getProduct();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="create">
		<h1>Update Product</h1>
		<hr>

		<form action="<?php echo $this->getUrl('save',null,['productId'=>$product->productId]); ?>" method="POST">
			
			<table>
				<tr>
					<td>
						<label for="product">Product ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
						<label for="sku">SKU</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="product[productId]" id="productId" size="50" disabled="auto">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="product[sku]" id="sku" size="50" value="<?php echo $product->sku; ?>"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="name">NAME</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="price">PRICE</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="product[name]" id="name" size="50" value="<?php echo $product->name; ?>" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="product[price]" id="price" size="50" value="<?php echo $product->price; ?>"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="discount">DISCOUNT</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
						<label for="quantity">QUANTITY</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="product[discount]" id="discount" size="50" value="<?php echo $product->discount; ?>"  required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input style="width: 350px;" type="text" id="quantity" name="product[quantity]" value="<?php echo $product->quantity; ?>" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="description">DESCRIPTION</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<label for="status">STATUS (0 or 1)</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="product[description]" required="required" value="<?php echo $product->description; ?>" size="50">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input style="width: 350px;" type="text" id="status" name="product[status]" value="<?php echo $product->status; ?>"  required="required">
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