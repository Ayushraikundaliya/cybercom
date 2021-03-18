<?php

namespace Block\Admin\Customer\Edit\Tabs;
\Mage::getBlock('Block\Admin\Core\Template');

class Form extends\Block\Admin\Core\Template{
	protected $customer = null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/customer/edit/tabs/form.php');
	}

	public function setCustomer($customer = Null) {
		if($customer) {
			$this->customer = $customer;
			return $this;
		}
		$customer = \Mage::getModel('Model\Customer');
		if($id = $this->getRequest()->getGet('customerId')) {
			$customer = $customer->load($id);
		}
		$this->customer = $customer;
		return $this;
	}

	public function getCustomer() {
		if(!$this->customer) {
			$this->setCustomer();
		}
		return $this->customer;
	}
}

?>