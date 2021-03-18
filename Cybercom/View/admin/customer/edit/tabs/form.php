<?php

$customer = $this->getCustomer();


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="create">
		<h1>Create Customer</h1>
		<hr>

		<form action="<?php echo $this->getUrl('save') ?>" method="POST">
			<table>
				<tr>
					<td>
						<label for="customerId">Customer ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<label for="firstName">FIRST NAME</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="customer[customerId]" id="customerId" size="50" disabled="auto">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="customer[firstName]" id="firstName" value="<?php echo $customer->firstName; ?>" size="50"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="lastName">LAST NAME</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="email">EMAIL</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="customer[lastName]" id="lastName" value="<?php echo $customer->lastName; ?>" size="50" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="customer[email]" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $customer->email; ?>" size="50"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="mobile">MOBILE</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;
						<label for="password">PASSWORD</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="customer[mobile]" id="mobile" value="<?php echo $customer->mobile; ?>" size="50"  required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input style="width: 350px;" type="password" id="password" name="customer[password]" value="<?php echo $customer->password; ?>" required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="status">STATUS (0 or 1)</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="customer[status]" id="status" value="<?php echo $customer->status; ?>" required="required" size="50">
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