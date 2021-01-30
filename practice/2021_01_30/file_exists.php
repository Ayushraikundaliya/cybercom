<?php

$filename = 'newfile.txt';

if(file_exists($filename))
{
	echo "File Exist";
}
else{
	$file = fopen($filename, 'w');
	fwrite($file, 'Hey! There?');
	fclose($file);
}


?>