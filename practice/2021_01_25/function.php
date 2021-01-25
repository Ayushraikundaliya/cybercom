<?php

$n1 = 20;
$n2 = 5;

echo add($n1,$n2).'<br>';

function add($n1,$n2){
	return $n1+$n2;
}

echo add(10,20).'<br>';
echo add($n1,$n2).'<br>';


function divide($n1,$n2){
	return $n1/$n2;
}

$result = divide(add(10,20),add(2,4));
echo $result;

?>