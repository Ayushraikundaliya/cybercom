<?php

$directory = "files";

if($file = opendir($directory.'/'))
{
	echo "Looking Inside ".$directory.':<br>';

	while ($folder = readdir($file)) {
		echo '<a href="'.$directory.'/'.$folder.'">'.$folder.'<br>';
	}
}


?>