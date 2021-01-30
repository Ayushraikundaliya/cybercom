<?php

$filename = 'New_files.txt';

if(@unlink($filename))
{
	echo "Deleted";
}
else{
	echo "Not Deleted";
}

?>