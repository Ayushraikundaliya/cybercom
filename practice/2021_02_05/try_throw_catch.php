<?php

$age = 26;

try{
	if($age >= 18)
	{
		echo "You're an adult.";
	}
	else
	{
		throw new exception('Not an Adult.');
	}
}
catch (Exception $ex){
	echo 'Error: '.$ex->getMessage();
}

?>