<?php

$xml = simplexml_load_file('example.xml');

foreach ($xml->producer as $producer) {
	echo $producer->name.' '.$producer->age.'<br>';
}

?>