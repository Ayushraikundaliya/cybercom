<?php

$shippings = $this->getShippings();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="contact">
		<h1>Shipping</h1>
		<hr>
		<button onclick="location.href='<?php echo $this->getUrl('form','shipping'); ?>'"><a href="<?php echo $this->getUrl('form','shipping'); ?>"></a>Create Shipping</button>

		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>ShippingId</th>
					<th>Name</th>
					<th>Code</th>
					<th>Amount</th>
					<th>Description</th>
					<th>CreatedDate</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				 <?php if (!$shippings) : ?>
                    <tr>
                        <td colspan="3">No Record Found.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($shippings as $key) : ?>
				<tr>
					<td><?php echo htmlentities($key->shippingId); ?></td>
					<td><?php echo htmlentities($key->name); ?></td>
					<td><?php echo htmlentities($key->code); ?></td>
					<td><?php echo htmlentities($key->amount); ?></td>
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
						<a href="<?php echo $this->getUrl('form',Null,['shippingId' => $key->shippingId]); ?>">
							<button style="background-color: lightblue;width: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="<?php echo $this->getUrl('delete',Null,['shippingId' => $key->shippingId]) ?>">
							<button style="background-color: red;width: 30px;" onclick="return confirm('Do you really want to delete?');">
								<i class="fa fa-trash-o"></i>
							</button>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
                <?php endif; ?>
			</tbody>
		</table>
	</div>
	</div>

</body>
</html>