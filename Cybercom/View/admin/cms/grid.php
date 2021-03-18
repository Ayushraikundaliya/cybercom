<?php

$cmss = $this->getCmss();

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
		<button onclick="location.href='<?php echo $this->getUrl('form','cms',null,true); ?>'"><a href="<?php echo $this->getUrl('form','cms',null,true); ?>"></a>Create Payment</button>

		<div class="tables">
		<table>
			<thead>
				<tr>
					<th>PageId</th>
					<th>Title</th>
					<th>Identifier</th>
					<th>Content</th>
					<th>CreatedDate</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cmss as $key) {
				
				 ?>
				<tr>
					<td><?php echo htmlentities($key->pageId); ?></td>
					<td><?php echo htmlentities($key->title); ?></td>
					<td><?php echo htmlentities($key->identifier); ?></td>
					<td><?php echo htmlentities($key->content); ?></td>
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
						<a href="<?php echo $this->getUrl('form',Null,['cmsId' => $key->pageId],true); ?>">
							<button style="background-color: lightblue;width: 30px;">
								<i class="fa fa-pencil"></i>
							</button>
						</a>
					</td>
					<td>
						<a href="<?php echo $this->getUrl('delete',Null,['cmsId' => $key->pageId],true) ?>">
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