<?php

class abc{

	public function __construct($Something){
		$this->saysomething($Something);
	}

	public function saysomething($Something){
		echo $Something;
	}
}

$obj1 = new abc("Hello");

?>