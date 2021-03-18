<?php

namespace Block\Admin\Core\Layout;
\Mage::getBlock('Block\Admin\Core\Template');

class Content extends \Block\Admin\Core\Template {
	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/Core/Layout/content.php');
	}
}


?>