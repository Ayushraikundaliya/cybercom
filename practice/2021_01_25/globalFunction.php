<?php

$a = 10;

function print_a(){
	echo $a;
}

print_a();// Show an error


function nowPrint_a(){
	global $a;
	echo $a;
}

nowPrint_a(); //Output : 10

NOWPRINT_A(); //This shows that function is not case-sensitive (it will stiil call print_a() function)

?>