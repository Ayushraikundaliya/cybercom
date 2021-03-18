<?php

namespace Block\Admin\Customer\Edit;
\Mage::getBlock('Block\Admin\Core\Template');

class Tabs extends \Block\Admin\Core\Template {
	protected $tabs = [];
	protected $defaultTab = null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/customer/edit/tabs.php');
		$this->prepareTab();
	}

	public function prepareTab() {
		$this->addTab('customer',['label' => 'Customer Information','block' => 'Block\Admin\Customer\Edit\Tabs\Form']);
        $this->addTab('address',['label' => 'Address','block' => 'Block\Admin\Customer\Edit\Tabs\Address']); 
        
        $this->setDefaultTab('customer');
        return $this;
	}
}

?>