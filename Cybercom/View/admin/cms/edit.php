<?php

$cms = $this->getCms();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="create">
		<h1>Update Cms</h1>
		<hr>

		<form action="<?php echo $this->getUrl('save',null,['cmsId'=>$cms->cmsId]); ?>" method="POST">
			
			<table>
				<tr>
					<td>
						<label for="pageId">Page ID</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<label for="title">Title</label>
					</td>
				</tr>
				<tr>
					<td>

						<input type="text" name="cms[pageId]" id="pagetId" size="50" disabled="auto">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<input type="text" name="cms[title]" id="name" size="50" value="<?php echo $cms->title; ?>"  required="required">
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td>
						<label for="identifier">Identifier</label>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&nbsp;&nbsp;
						<label for="content">Content</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="cms[identifier]" id="code" size="50" value="<?php echo $cms->identifier; ?>" required="required">
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<textarea name="cms[content]" id="content" cols="60" rows="2" ><?php echo $cms->content ?></textarea>
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
						<input style="width: 350px;" type="text" id="status" name="cms[status]" value="<?php echo $cms->status; ?>"  required="required">
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