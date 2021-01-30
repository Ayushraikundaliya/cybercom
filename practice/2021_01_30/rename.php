<?php

$filename = 'newfile.txt';

if(@rename($filename, 'New_files.txt'))
{
	echo "Renamed";
}
else{
	echo "Cannot be Renamed";
}


?>