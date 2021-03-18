<?php

namespace Block\Admin\Product\Edit;
\Mage::getBlock('Block\Admin\Core\Template');

class Tabs extends \Block\Admin\Core\Template {
	protected $tabs = [];
	protected $defaultTab = null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs.php');
		$this->prepareTab();
	}

	public function prepareTab() {
		$this->addTab('form', ['label'=> 'Product Form', 'block' => 'Block\Admin\Product\Edit\Tabs\Form']);
		$this->addTab('product', ['label'=> 'Product Information', 'block' => 'Block\Admin\Product\Edit\Tabs\Information']);
		$this->addTab('media', ['label'=> 'Media', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);
		$this->setDefaultTab('form');
		return $this;
	}
}

?>