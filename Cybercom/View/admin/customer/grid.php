<?php

$customers = $this->getCustomers();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="contact">
		<h1>Customers</h1>
		<hr>
		<button onclick="location.href='<?php echo $this->getUrl('form','customer'); ?>'"><a href="<?php echo $this->getUrl('form','customer'); ?>"></a>Create Customers</button>

		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>CustomerId</th>
					<th>FirstName</th>
					<th>LastName</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>CreatedDate</th>
					<th>UpdatedDate</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($customers as $key) {
				
				 ?>
				<tr>
					<td><?php echo htmlentities($key->customerId); ?></td>
					<td><?php echo htmlentities($key->firstName); ?></td>
					<td><?php echo htmlentities($key->lastName); ?></td>
					<td><?php echo htmlentities($key->email); ?></td>
					<td><?php echo htmlentities($key->mobile); ?></td>
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
						<a href="<?php echo $this->getUrl('form',Null,['customerId' => $key->customerId]); ?>">
							<button style="background-color: lightblue;width: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="<?php echo $this->getUrl('delete',Null,['customerId' => $key->customerId]) ?>">
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