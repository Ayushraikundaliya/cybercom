<?php

$payments = $this->getPayments();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="contact">
		<h1>Payment</h1>
		<hr>
		<button onclick="location.href='<?php echo $this->getUrl('form','payment',null,true); ?>'"><a href="<?php echo $this->getUrl('form','payment',null,true); ?>"></a>Create Payment</button>

		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>PaymentId</th>
					<th>Name</th>
					<th>Code</th>
					<th>Description</th>
					<th>CreatedDate</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($payments as $key) {
				
				 ?>
				<tr>
					<td><?php echo htmlentities($key->paymentId); ?></td>
					<td><?php echo htmlentities($key->name); ?></td>
					<td><?php echo htmlentities($key->code); ?></td>
					<td><?php echo htmlentities($key->description); ?></td>
					<td><?php echo htmlentities($key->createdDate); ?></td>
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
						<a href="<?php echo $this->getUrl('form',Null,['paymentId' => $key->paymentId],true); ?>">
							<button style="background-color: lightblue;width: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="<?php echo $this->getUrl('delete',Null,['paymentId' => $key->paymentId],true) ?>">
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