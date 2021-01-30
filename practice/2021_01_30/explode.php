<?php

$filename = 'name.txt';
$file = fopen($filename, 'r');

$read = fread($file, filesize($filename));

echo $read.'<br>';

$name = explode(',', $read);

foreach ($name as $names) {
	echo $names.'<br>';
}



?>