<?php

namespace Block\Admin\Product;
\Mage::getBlock('Block\Admin\Core\Template');

class Grid extends \Block\Admin\Core\Template {
	protected $products = [];

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/product/grid.php');
	}

	public function setProducts($products = NULL)
	{
		if(!$products)
		{
			$product = \Mage::getModel('Model\Product');
			$products = $product->fetchAll();
		}
		$this->products = $products;
		return $this;
	}

	public function getProducts()
	{
		if (!$this->products) {
			$this->setProducts();
		}
		return $this->products; 
	}
}

?>