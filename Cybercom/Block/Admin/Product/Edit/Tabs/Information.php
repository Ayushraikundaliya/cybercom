<?php

namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock('Block\Admin\Core\Template');

class Information extends\Block\Admin\Core\Template{
	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/information.php');
	}
}

?>