<?php

namespace Block\Admin\Cms;
\Mage::getBlock('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template {
	protected $cms = Null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/cms/edit.php');
	}

	public function setCms($cms = Null) {
		if($cms) {
			$this->cms = $cms;
			return $this;
		}
		$cms = \Mage::getModel('Model\Cms');
		if($id = $this->getRequest()->getGet('cmsId')) {
			$cms = $cms->load($id);
		}
		$this->cms = $cms;
		return $this;
	}

	public function getCms() {
		if(!$this->cms) {
			$this->setCms();
		}
		return $this->cms;
	}

}

?>