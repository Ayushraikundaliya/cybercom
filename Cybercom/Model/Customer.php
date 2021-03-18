<?php

namespace Model;
\Mage::getModel('Model\Core\Table');

class Customer extends Core\Table {
	public function __construct() {
		$this->setTableName("customer");
		$this->setPrimaryKey("customerId");
	}
}

?>