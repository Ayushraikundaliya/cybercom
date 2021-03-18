<?php

namespace Model;
\Mage::getModel('Model\Core\Table');

class Payment extends Core\Table {
	public function __construct() {
		$this->setTableName("payment");
		$this->setPrimaryKey("paymentId");
	}
}

?>