<?php

namespace Block\Admin\Category;
\Mage::getBlock('Block\Admin\Core\Template');

class Grid extends \Block\Admin\Core\Template {
	protected $categories = [];

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/category/grid.php');
	}

	 public function setCategories($categories = null)
    {
        if (is_null($categories)) {
            $query = "SELECT * FROM `category` ORDER BY `pathId` ASC;";
            $categories = \Mage::getModel('Model\Category')->fetchAll($query);
        }
        $this->categories = $categories;
        return $this;
    }

    public function getCategories()
    {
        if (!$this->categories) {
            $this->setCategories();
        }
        return $this->categories;
    }

    public function getName($category)
    {
        $categoryModel = \Mage::getModel('Model\Category');
        if (!$this->categoriesOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$categoryModel->getTableName()}`";
            $this->categoriesOptions = $categoryModel->getAdapter()->fetchPairs($query);
        }

        $pathIds = explode('=', $category->pathId);
        foreach ($pathIds as $key => &$id) {
            if (array_key_exists($id, $this->categoriesOptions)) {
                $id = $this->categoriesOptions[$id];
            }
        }
        $name = implode('/', $pathIds);
        return $name;
    }
}

?>