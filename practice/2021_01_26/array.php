<?php

$number = array(1,2,3,4,5);

echo $number[1]; //Print value at index 1. 

echo $number; //Just print "Array".

echo "<br>";

print_r($number); //Print array with it's index value.

$number[5] = 6;

echo "<br>";

print_r($number);

$num = array('one'=>1,'two'=>2,'three'=>3,'four'=>4,'five'=>5); //Associative ARRAY - which means manual assign a key to a value.

echo "<br>";

print_r($num);

echo "<br>";

$multi = array('odd'=>array(1,3,5),'even'=>array(2,4)); //Multidimensional Arrays

echo $multi['even'][1];
echo "<br>";
echo $multi['odd'][2];

?>