<?php

namespace Block\Admin\Category;
\Mage::getBlock('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template {
	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/category/edit.php');
	}

	public function getTabContent() {
		$tabBlock = \Mage::getBlock('Block\Admin\Category\Edit\Tabs');
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