<?php

$s1 = 'My name is Ayush.';

echo str_word_count($s1).'<br>'; //With only 1 argument - Output : 4 


echo str_word_count($s1,0).'<br>'; //With 2 argument - Second one is 0 - Output : 4


echo str_word_count($s1,1).'<br>'; //With 2 argument - Second one is 1 - Output : Array


print_r(str_word_count($s1,1)); //With 2 argument - Second one is 1 - We use "print_r" instead of "echo" - Output : Array ( [0] => My [1] => name [2] => is [3] => Ayush)

echo '<br>';

print_r(str_word_count($s1,2)); //With 2 argument - Second one is 2 - We use "print_r" instead of "echo" - Output : Array([0] => My [3] => name [8] => is [11] => Ayush) - Starting index of each word.

echo "<br>";

//So, far we're seeing that '.' is not counted or printed in any of the output. If we want that then we have to give the 3rd argument.

print_r(str_word_count($s1,1,'.')); //With 3 argument -Output : Array([0] => My [1] => name [2] => is [3] => Ayush.) - '.' - gets added.

echo "<br>";

echo str_shuffle($s1); //Randomization of string.

echo "<br>";

echo substr($s1, 0,8); //To get a substring.

echo "<br>";

echo strrev($s1); //Reverse a String.

$s2 = 'My hobbies is to read';

echo "<br>";

echo similar_text($s1, $s2); //Gives the numeric similarity between two strings in %.

echo "<br>";

echo strlen($s1); //To find length of the string
?>