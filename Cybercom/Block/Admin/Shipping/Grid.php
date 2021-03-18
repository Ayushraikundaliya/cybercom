<?php

namespace Block\Admin\Shipping;
\Mage::getBlock('Block\Admin\Core\Template');

class Grid extends \Block\Admin\Core\Template {
	protected $shippings = [];

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/shipping/grid.php');
	}

	public function setShippings($shippings = NULL)
	{
		if(!$shippings)
		{
			$shipping = \Mage::getModel('Model\Shipping');
			$shippings = $shipping->fetchAll();
		}
		$this->shippings = $shippings;
		return $this;
	}

	public function getShippings()
	{
		if (!$this->shippings) {
			$this->setShippings();
		}
		return $this->shippings; 
	}
}

?>