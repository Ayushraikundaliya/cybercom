<?php

namespace Block\Admin\Category\Edit;
\Mage::getBlock('Block\Admin\Core\Template');

class Tabs extends \Block\Admin\Core\Template {
	protected $tabs = [];
	protected $defaultTab = null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/category/edit/tabs.php');
		$this->prepareTab();
	}

	public function prepareTab() {
		$this->addTab('category',['label' => 'Category Information','block' => 'Block\Admin\Category\Edit\Tabs\Form']);
        $this->addTab('media',['label' => 'Media','block' => 'Block\Admin\Category\Edit\Tabs\Media']);
        $this->setDefaultTab('category');
        return $this;
	}
}

?>