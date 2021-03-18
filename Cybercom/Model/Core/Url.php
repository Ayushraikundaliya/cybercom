<?php

namespace Model\Core;

class Url {
	protected $request = Null;

	public function __construct() {
		$this->setRequest();
	}

	public function setRequest() {
		$this->request = \Mage::getBlock('Model\Core\Request');
		return $this;
	}

	public function getRequest() {
		if(!$this->request) {
			$this->setRequest();
		}
		return $this->request;
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
}

?>