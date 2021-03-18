<?php

namespace Model;
\Mage::getModel('Model\Core\Table');

class Media extends Core\Table {
	public function __construct() {
		$this->setTableName("media");
		$this->setPrimaryKey("mediaId");
	}
}

?>