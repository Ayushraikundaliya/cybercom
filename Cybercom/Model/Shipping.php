<?php

namespace Model;
\Mage::getModel('Model\Core\Table');

class Shipping extends Core\Table {
	public function __construct() {
		$this->setTableName("shipping");
		$this->setPrimaryKey("shippingId");
	}
}

?>