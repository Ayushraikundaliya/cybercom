<?php

namespace Block\Admin\Payment;
\Mage::getBlock('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template {
	protected $payment = Null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/payment/edit.php');
	}

	public function setPayment($payment = Null) {
		if($payment) {
			$this->payment = $payment;
			return $this;
		}
		$payment = \Mage::getModel('Model\Payment');
		if($id = $this->getRequest()->getGet('paymentId')) {
			$payment = $payment->load($id);
		}
		$this->payment = $payment;
		return $this;
	}

	public function getPayment() {
		if(!$this->payment) {
			$this->setPayment();
		}
		return $this->payment;
	}

}

?>