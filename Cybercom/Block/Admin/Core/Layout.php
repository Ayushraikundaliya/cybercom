<?php

namespace Block\Admin\Core;
\Mage::getBlock('Block\Admin\Core\Template');

class Layout extends \Block\Admin\Core\Template {
	
	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/core/layout/oneColumn.php');
		$this->prepareChildren();
	}	

	public function prepareChildren() {
		$this->addChild($this->createBlock('Block\Admin\Core\Layout\Content'),'content');
		$this->addChild($this->createBlock('Block\Admin\Core\Layout\Header'),'header');
		$this->addChild($this->createBlock('Block\Admin\Core\Layout\Left'),'left');
		$this->addChild($this->createBlock('Block\Admin\Core\Layout\Footer'),'footer');

	}

	public function getContent() {
		return $this->getChild('content');
	}

	public function getHeader() {
		return $this->getChild('header');
	}

	public function getLeft() {
		return $this->getChild('left');
	} 

}

?>