<?php

namespace Block\Admin\Customer;
\Mage::getBlock('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template {
	protected $customer = Null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/customer/edit.php');
	}

	public function getTabContent() {
		$tabBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
		$tabs = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		$block->render();
	}
}

?>