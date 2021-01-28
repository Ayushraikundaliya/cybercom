<?php

$time = time();
$time1 = date('H:i:s',$time);

echo $time1;

$day = date('D M Y',$time);

echo "<br>";

echo $day;

$day1 = date('d m Y',$time);

echo "<br>";

echo $day1;

$day2 = date('D M Y @ H:i:s',$time);

echo "<br>";

echo $day2;

$day3 = date('D M Y @ H:i:s',$time+50);  //Modified time

echo "<br>";

echo $day3;

$day4 = date('d M Y @ H:i:s',strtotime('+1 week')); //Date will get increased

echo "<br>";

echo $day4;

$day5 = date('d M Y @ H:i:s',strtotime('+2 week 2 hours 20 minutes')); //Date and time will get increased

echo "<br>";

echo $day5;
?>