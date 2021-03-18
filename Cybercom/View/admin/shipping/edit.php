<?php

$shipping = $this->getShipping();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="create">
		<h1>Update Shipping</h1>
		<hr>

		<form action="<?php echo $this->getUrl('save',null,['shippingId'=>$shipping->shippingId]); ?>" method="POST">
			
			<table>
				<tr>
					<td>
						<label for="shippingId">SHIPPING ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="name">NAME</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="shipping[shippingId]" id="shippingId" size="50" disabled="auto">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="shipping[name]" id="name" size="50" value="<?php echo $shipping->name; ?>"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="code">CODE</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="amount">AMOUNT</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="shipping[code]" id="code" size="50" value="<?php echo $shipping->code; ?>" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="shipping[amount]" required="required" value="<?php echo $shipping->amount; ?>" size="50">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="description">DESCRIPTION</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="status">STATUS (0 or 1)</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="shipping[description]" required="required" value="<?php echo $shipping->description; ?>" size="50">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input style="width: 350px;" type="text" id="status" name="shipping[status]" value="<?php echo $shipping->status; ?>"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
					<td><input style="background-color: #00e673; width:100px;color: white;" type="submit" name="submit" value="Create"></td>
				</tr>
			</table>
		</form>
	</div>

</body>
</html>