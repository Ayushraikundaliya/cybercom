<?php

class Mage {
	public static function init() {
		self::loadFileByClassName("Controller\Admin\Core\Front");
		\Controller\Core\Front::init();
	}

	public static function loadFileByClassName($className) {
		$className = ucwords(str_replace("\\", " ", $className));
		$className = str_replace(" ", "/", $className).".php";
		require_once $className;
	}

	public static function getController($controllerName) {
		self::loadFileByClassName($controllerName);

		$controllerName = ucwords(str_replace("\\", " ", $controllerName));
		$controllerName = str_replace(" ", "\\", $controllerName);
		return new $controllerName;
	}

	public static function getModel($modelName) {
		self::loadFileByClassName($modelName);

		$modelName = ucwords(str_replace("\\", " ", $modelName));
		$modelName = str_replace(" ", "\\", $modelName);
		return new $modelName;
	}

	public static function getBlock($blockName) {
		self::loadFileByClassName($blockName);

		$blockName = ucwords(str_replace("\\", " ", $blockName));
		$blockName = str_replace(" ", "\\", $blockName);
		return new $blockName;
	}
}

Mage::init();
?>