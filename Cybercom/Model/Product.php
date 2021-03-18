<?php

namespace Model;
\Mage::getModel('Model\Core\Table');

class Product extends Core\Table {
	public function __construct() {
		$this->setTableName("product");
		$this->setPrimaryKey("productId");
	}
}

?>