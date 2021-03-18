<?php

namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock('Block\Admin\Core\Template');

class Media extends\Block\Admin\Core\Template{
	protected $media = null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/media.php');
	}

	public function setMedia($media = null) {
		if ($media) {
            $this->media = $media;
        }
        $id = $this->getRequest()->getGet('productId');
        $media = \Mage::getModel('Model\Media');
        $query = "SELECT * FROM `{$media->getTableName()}` WHERE `productId` = '{$id}'";
        $media = $media->fetchAll($query);
        $this->media = $media;
        return $this;
	}

	public function getMedia() {
		if (!$this->media) {
            $this->setMedia();
        }
        return $this->media;
	}
}

?>