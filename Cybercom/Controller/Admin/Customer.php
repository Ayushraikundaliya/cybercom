<?php

namespace Controller\Admin;
\Mage::getController('Controller\Admin\Core\Admin');

class Customer extends Core\Admin {
	protected $customerModel = null;

	public function setCustomerModel($customerModel = Null) {
		if(!$customerModel) {
			$this->customerModel = $customerModel;
		}
		$this->customerModel = \Mage::getModel('Model\Customer');
		return $this;
	}

	public function getCustomerModel() {
		if(!$this->customerModel) {
			$this->setCustomerModel();
		}
		return $this->customerModel;
	}

	public function gridAction() {
		try {
			$gridBlock = \Mage::getBlock('Block\Admin\Customer\Grid');
			$layout = $this->getLayout();
			$grid = $layout->getChild('content');
			$grid->addChild($gridBlock,'grid');
			$this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function formAction() {
		try {
			$editBlock = \Mage::getBlock('Block\Admin\Customer\Edit');
            $layout = $this->getLayout();
            $layout->getLeft()->addChild(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
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
			$customer = $this->getCustomerModel();
			if ($id = (int) $this->getRequest()->getGet('customerId')) {
				$customer = $customer->load($id);

				if (!$customer) {
					$this->getMessage()->setFailure("Record not found");		
				}
				$customer->updatedDate = date('Y-m-d H:i:s');
			} else {
				$customer->createdDate = date('Y-m-d H:i:s');
			}

			$customerData = $this->getRequest()->getPost('customer');
			$customer->setData($customerData);

			$customer->save();
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
			$customerData = $this->request->getGet();
			$customer =  \Mage::getModel('Model\Customer');
			$customer->setData($customerData);
			if($customer->deleteData($customerData['customerId'])) {
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