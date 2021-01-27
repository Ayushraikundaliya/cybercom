<?php

$num = array('odd' => array(1,3,5),'even'=>array(2,4));

foreach ($num as $key => $value) {
	echo $key.'<br>';
	foreach ($value as $inner) {
		echo $inner.'<br>';
	}
}

?>