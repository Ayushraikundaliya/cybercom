<?php

namespace Block\Admin\Cms;
\Mage::getBlock('Block\Admin\Core\Template');

class Grid extends \Block\Admin\Core\Template {
	protected $cmss = [];

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/cms/grid.php');
	}

	public function setCmss($cmss = NULL)
	{
		if(!$cmss)
		{
			$cms = \Mage::getModel('Model\Cms');
			$cmss = $cms->fetchAll();
		}
		$this->cmss = $cmss;
		return $this;
	}

	public function getCmss()
	{
		if (!$this->cmss) {
			$this->setCmss();
		}
		return $this->cmss; 
	}
}

?>