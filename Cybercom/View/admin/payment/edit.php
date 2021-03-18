<?php

$payment = $this->getPayment();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="create">
		<h1>Update Payment</h1>
		<hr>

		<form action="<?php echo $this->getUrl('save',null,['paymentId'=>$payment->paymentId],true); ?>" method="POST">
			
			<table>
				<tr>
					<td>
						<label for="paymentId">PAYMENT ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="name">NAME</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="payment[paymentId]" id="paymentId" size="50" disabled="auto">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="payment[name]" id="name" size="50" value="<?php echo $payment->name; ?>"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="code">CODE</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
						<label for="description">DESCRIPTION</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="payment[code]" id="code" size="50" value="<?php echo $payment->code; ?>" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="payment[description]" required="required" value="<?php echo $payment->description; ?>" size="50">
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
						<input style="width: 350px;" type="text" id="status" name="payment[status]" value="<?php echo $payment->status; ?>"  required="required">
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