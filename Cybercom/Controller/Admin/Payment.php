<?php

namespace Controller\Admin;
\Mage::getController('Controller\Admin\Core\Admin');

class Payment extends Core\Admin {
	protected $paymentModel = null;

	public function setPaymentModel($paymentModel = Null) {
		if(!$paymentModel) {
			$this->paymentModel = $paymentModel;
		}
		$this->paymentModel = \Mage::getModel('Model\Payment');
		return $this;
	}

	public function getPaymentModel() {
		if(!$this->paymentModel) {
			$this->setPaymentModel();
		}
		return $this->paymentModel;
	}

	public function gridAction() {
		try {
			$gridBlock = \Mage::getBlock('Block\Admin\Payment\Grid');
			$layout = $this->getLayout();
			$grid = $layout->getChild('content');
			$grid->addChild($gridBlock,'grid');
			$this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function formAction() {
		try {
			$editBlock = \Mage::getBlock('Block\Admin\Payment\Edit');
            $layout = $this->getLayout();
            $layout->setTemplate('./View/admin/core/layout/twoColumn.php');
            $edit = $layout->getChild('content');
            $edit->addChild($editBlock,'edit');
            $this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function saveAction() {
		date_default_timezone_set('Asia/Kolkata');
		try{ 
			$payment = $this->getPaymentModel();
			if ($id = (int) $this->getRequest()->getGet('paymentId')) {
				$payment = $payment->load($id);

				if (!$payment) {
					$this->getMessage()->setFailure("Record not found");		
				}
			} else {
				$payment->createdDate = date('Y-m-d H:i:s');
			}

			$paymentData = $this->getRequest()->getPost('payment');
			$payment->setData($paymentData);

			$payment->save();
			$this->redirect('grid',null,null,true);

		} catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}

	public function deleteAction() {
		try {
			if (!$this->request->isGet()) {
				$this->getMessage()->setFailure("Invalid");
			}
			$paymentData = $this->request->getGet();
			$payment =  \Mage::getModel('Model\Payment');
			$payment->setData($paymentData);
			if($payment->deleteData($paymentData['paymentId'])) {
				//$this->getMessage()->setSuccess('Record Delete Successfully.');
			} else {
				//$this->getMessage()->setFailure('Record Not Deleted.');
			}
		} catch (Exception $e) {
			//$this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('grid',NULL,[],true);
	}

}

?>