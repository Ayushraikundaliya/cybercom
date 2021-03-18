<?php

namespace Block\Admin\Core;

class Template {

	protected $template = Null;
	protected $controller = Null;
	protected $children = [];
	protected $urlObject = null;
	protected $request = null;
	protected $message = Null;

	public function __construct() {
		$this->setUrlObject();
		$this->setRequest();
	}

	public function setTemplate($template) {
		$this->template = $template;
		return $this;
	}

	public function getTemplate() {
		return $this->template;
	}

	public function setController(\Controller\Admin\Core\Admin $controller = Null) {
		$this->controller = $controller;
		return $this;
	}

	public function getController() {
		return $this->controller;
	}

	public function render() {
		require_once $this->getTemplate();	
	}

	public function setUrlObject($url = Null) {
		if(!$url)
        {
            $url = \Mage::getModel('Model\Core\Url');
        }
        $this->url=$url;
        return $this;
	}

	public function getUrlObject() {
		if(!$this->url) {
			$this->setUrlObject();
		}
		return $this->url;
	}

	public function getUrl($actionName = Null, $controllerName = Null, $params = [], $resetParams = false) {
		return $this->getUrlObject()->getUrl($actionName, $controllerName, $params, $resetParams);
	}

	public function setRequest($request = null) {
		if(!$request) {
			$this->request = \Mage::getModel('Model\Core\Request');
		}
		return $this;
	}

	public function getRequest() {
		if(!$this->request) {
			$this->setRequest();		
		}
		return $this->request;
	}

	public function setChildren(array $children=[]) {
		$this->children = $children;
		return $this;
	}

	public function getChildren() {
		return $this->children;
	}

	public function addChild(\Block\Admin\Core\Template $child = Null,$key = Null) {
		if(!$key) {
			$key = get_class($child);
		}
		$this->children[$key] = $child;
		return $this;
	}

	public function getChild($key) {
		if(!array_key_exists($key, $this->children)) {
			return Null;
		}
		return $this->children[$key];
	}

	public function removeChild($key) {
		if(array_key_exists($key, $this->children)) {
			unset($this->children[$key]);
		}
		return $this;
	}

	public function createBlock($className) {
		return \Mage::getBlock($className);
	}

	public function setDefaultTab($defaultTab) {
		$this->defaultTab = $defaultTab;
		return $this;
	}

	public function getDefaultTab() {
		return $this->defaultTab;
	}

	public function setTabs(array $tabs = []) {
		$this->tabs = $tabs;
		return $this;
	}

	public function getTabs() {
		return $this->tabs;
	}

	public function addTab($key, $tab = []) {
		$this->tabs[$key] = $tab;
		return $this;
	}

	public function getTab($key) {
		if(!array_key_exists($key, $this->tabs)) {
			return null;
		}
		return $this->tabs[$key];
	}

	public function removeTab($key) {
		if(!array_key_exists($key, $this->tabs)) {
			return null;
		}
		unset($this->tabs[$key]);
	}

}

?>