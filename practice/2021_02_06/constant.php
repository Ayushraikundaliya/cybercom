<?php

class Circle{
	const pi = 3.14;

	public function area($radius)
	{
		return self::pi * ($radius*$radius);
	}
}

$obj1 = new Circle;
echo $obj1->area(10);

?>