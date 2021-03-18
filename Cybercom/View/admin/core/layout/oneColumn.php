<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table width="100%">
		<tbody>
			<tr>
				<td height="100px" colspan="3">
					<?php $this->getChild("header")->render(); ?>
				</td>
			</tr>
			<tr>
				<td height="500px" width="150px">
					<?php 

					$this->getChild('content')->render();
					
					?>
				</td>
			</tr>
			<tr>
				<td height="100px" colspan="3">
					<?php $this->getChild('footer')->render(); ?>
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>