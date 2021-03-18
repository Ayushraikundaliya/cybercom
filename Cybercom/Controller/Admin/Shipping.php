<?php

namespace Controller\Admin;
\Mage::getController('Controller\Admin\Core\Admin');

class Shipping extends Core\Admin {
	protected $shippingModel = null;

	public function setShippingModel($shippingModel = Null) {
		if(!$shippingModel) {
			$this->shippingModel = $shippingModel;
		}
		$this->shippingModel = \Mage::getModel('Model\Shipping');
		return $this;
	}

	public function getShippingModel() {
		if(!$this->shippingModel) {
			$this->setShippingModel();
		}
		return $this->shippingModel;
	}

	public function gridAction() {
		try {
			$gridBlock = \Mage::getBlock('Block\Admin\Shipping\Grid');
			$layout = $this->getLayout();
			$grid = $layout->getChild('content');
			$grid->addChild($gridBlock,'grid');
			$this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function formAction() {
		try {
			$editBlock = \Mage::getBlock('Block\Admin\Shipping\Edit');
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
			$shipping = $this->getShippingModel();
			if ($id = (int) $this->getRequest()->getGet('shippingId')) {
				$shipping = $shipping->load($id);

				if (!$shipping) {
					$this->getMessage()->setFailure("Record not found");		
				}
			} else {
				$shipping->createdDate = date('Y-m-d H:i:s');
			}

			$shippingData = $this->getRequest()->getPost('shipping');
			$shipping->setData($shippingData);

			$shipping->save();
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
			$shippingData = $this->request->getGet();
			$shipping =  \Mage::getModel('Model\Shipping');
			$shipping->setData($shippingData);
			if($shipping->deleteData($shippingData['shippingId'])) {
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