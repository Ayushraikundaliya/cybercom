<?php

namespace Controller\Admin\Core;

class Admin {
	protected $layout = Null;
	protected $request = Null;
	//protected $message = Null;

	public function __construct() {
		$this->setRequest();
		$this->setLayout();
		//$this->setMessage();
	}

	public function redirect($actionName = Null , $controllerName = Null , $params = [] , $resetParams = false) {
		header("Location:".$this->getUrl($actionName,$controllerName,$params,$resetParams));
		exit(0);
	}

	public function getUrl($actionName = Null , $controllerName = Null , $params = [] , $resetParams = false) {
		$final = $_GET;
		if($resetParams) {
			$final = [];
		}
		if($actionName == Null) {
			$actionName = $_GET['a'];
		}
		if($controllerName == Null) {
			$controllerName = $_GET['c'];
		}
		if($params == Null) {
			$params = [];
		}
		$final['c'] = $controllerName;
		$final['a'] = $actionName;

		$final = array_merge($final,$params);
		$queryString = http_build_query($final);
		unset($final);
		return "http://localhost/Cybercom/?{$queryString}";
	}

	public function setLayout(\Block\Admin\Core\Layout $layout = Null,$controllerName = Null) {
		if(!$controllerName) {
			$controllerName = $this;
		}
		if(!$layout) {
			$layout = \Mage::getBlock('Block\Admin\Core\Layout');
		}
		$this->layout = $layout;
		return $this;
	}

	public function getLayout() {
		if(!$this->layout) {
			$this->setLayout();
		}
		return $this->layout;
	}

	public function renderLayout() {
		$this->getLayout()->render();
	}

	public function setRequest() {
		$this->request = \Mage::getModel('Model\Core\Request');
		return $this;
	}

	public function getRequest() {
		if(!$this->request) {
			$this->setRequest();
		}
		return $this->request;
	}

	/*public function setMessage($message = null) {
		$this->message = \Mage::getModel('Model\Admin\Message');
		return $this;
	}

	public function getMessage() {
		if(!$this->message) {
			$this->setMessage();
		}
		return $this->message;
	}*/
}

?>