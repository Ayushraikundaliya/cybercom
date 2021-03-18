<?php

namespace Block\Admin\Customer;
\Mage::getBlock('Block\Admin\Core\Template');

class Grid extends \Block\Admin\Core\Template {
	protected $customers = [];

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/customer/grid.php');
	}

	public function setCustomers($customers = NULL)
	{
		if(!$customers)
		{
			$customer = \Mage::getModel('Model\Customer');
			$customers = $customer->fetchAll();
		}
		$this->customers = $customers;
		return $this;
	}

	public function getCustomers()
	{
		if (!$this->customers) {
			$this->setCustomers();
		}
		return $this->customers; 
	}
}

?>