<?php

namespace Block\Admin\Payment;
\Mage::getBlock('Block\Admin\Core\Template');

class Grid extends \Block\Admin\Core\Template {
	protected $payments = [];

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/payment/grid.php');
	}

	public function setPayments($payments = NULL)
	{
		if(!$payments)
		{
			$payment = \Mage::getModel('Model\Payment');
			$payments = $payment->fetchAll();
		}
		$this->payments = $payments;
		return $this;
	}

	public function getPayments()
	{
		if (!$this->payments) {
			$this->setPayments();
		}
		return $this->payments; 
	}
}

?>