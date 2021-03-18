<?php

namespace Block\Admin\Shipping;
\Mage::getBlock('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template {
	protected $shipping = Null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/shipping/edit.php');
	}

	public function setShipping($shipping = Null) {
		if($shipping) {
			$this->shipping = $shipping;
			return $this;
		}
		$shipping = \Mage::getModel('Model\Shipping');
		if($id = $this->getRequest()->getGet('shippingId')) {
			$shipping = $shipping->load($id);
		}
		$this->shipping = $shipping;
		return $this;
	}

	public function getShipping() {
		if(!$this->shipping) {
			$this->setShipping();
		}
		return $this->shipping;
	}

}

?>