<?php

namespace Controller\Admin;
\Mage::getController('Controller\Admin\Core\Admin');

class Cms extends Core\Admin {
	protected $cmsModel = null;

	public function setCmsModel($cmsModel = Null) {
		if(!$cmsModel) {
			$this->cmsModel = $cmsModel;
		}
		$this->cmsModel = \Mage::getModel('Model\Cms');
		return $this;
	}

	public function getCmsModel() {
		if(!$this->cmsModel) {
			$this->setCmsModel();
		}
		return $this->cmsModel;
	}

	public function gridAction() {
		try {
			$gridBlock = \Mage::getBlock('Block\Admin\Cms\Grid');
			$layout = $this->getLayout();
			$grid = $layout->getChild('content');
			$grid->addChild($gridBlock,'grid');
			$this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function formAction() {
		try {
			$editBlock = \Mage::getBlock('Block\Admin\Cms\Edit');
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
			$cms = $this->getCmsModel();
			if ($id = (int) $this->getRequest()->getGet('cmsId')) {
				$cms = $cms->load($id);

				if (!$cms) {
					$this->getMessage()->setFailure("Record not found");		
				}
			} else {
				$cms->createdDate = date('Y-m-d H:i:s');
			}

			$cmsData = $this->getRequest()->getPost('cms');
			$cms->setData($cmsData);

			$cms->save();
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
			$cmsData = $this->request->getGet();
			$cms =  \Mage::getModel('Model\Cms');
			$cms->setData($cmsData);
			if($cms->deleteData($cmsData['cmsId'])) {
				//$this->getMessage()->setSuccess('Record Delete Successfully.');
			} else {
				//$this->getMessage()->setFailure('Record Not Deleted.');
			}
		} catch (Exception $e) {
			//$this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('grid',NULL,null,true);
	}

}

?>