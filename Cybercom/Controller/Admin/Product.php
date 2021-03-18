<?php

namespace Controller\Admin;
\Mage::getController('Controller\Admin\Core\Admin');

class Product extends Core\Admin {
	protected $productModel = null;

	public function setProductModel($productModel = Null) {
		if(!$productModel) {
			$this->productModel = $productModel;
		}
		$this->productModel = \Mage::getModel('Model\Product');
		return $this;
	}

	public function getProductModel() {
		if(!$this->productModel) {
			$this->setProductModel();
		}
		return $this->productModel;
	}

	public function gridAction() {
		try {
			$gridBlock = \Mage::getBlock('Block\Admin\Product\Grid');
			$layout = $this->getLayout();
			$grid = $layout->getChild('content');
			$grid->addChild($gridBlock,'grid');
			$this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function formAction() {
		try {
			$editBlock = \Mage::getBlock('Block\Admin\Product\Edit');
            $layout = $this->getLayout();
            $layout->getLeft()->addChild(\Mage::getBlock('Block\Admin\Product\Edit\Tabs'));
            $layout->setTemplate('./View/admin/core/layout/twoColumn.php');
            $edit = $layout->getChild('content');
            $edit->addChild($editBlock,'edit');
            $this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function saveAction() {
		$mediaController = \Mage::getController('Controller\Admin\Product\Media');
        if ($this->getRequest()->getGet('tab') == 'media') {
            $mediaController->mediaAction();
        }
		date_default_timezone_set('Asia/Kolkata');
		try{ 
			$product = $this->getProductModel();
			if ($id = (int) $this->getRequest()->getGet('productId')) {
				$product = $product->load($id);

				if (!$product) {
					$this->getMessage()->setFailure("Record not found");		
				}
				$product->updatedDate = date('Y-m-d H:i:s');
			} else {
				$product->createdDate = date('Y-m-d H:i:s');
			}

			$productData = $this->getRequest()->getPost('product');
			$product->setData($productData);

			$product->save();
			$this->redirect('grid',null,null,true);

		} catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}

	public function deleteAction() {
		try {
			if (!$this->request->isGet()) {
				$this->getMessage()->setFailure("Invalid");
			}
			$productData = $this->request->getGet();
			$product =  \Mage::getModel('Model\Product');
			$product->setData($productData);
			if($product->deleteData($productData['productId'])) {
				//$this->getMessage()->setSuccess('Record Delete Successfully.');
			} else {
				//$this->getMessage()->setFailure('Record Not Deleted.');
			}
		} catch (Exception $e) {
			//$this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('grid',NULL,[],true);
	}

	public function productMediaAction() {
    	
    	$media = \Mage::getModel("Model\Product");
        $media->setTableName('media');
        $primaryKey = $media->getPrimaryKey();
        $id = $this->getRequest()->getGet('id');
        
        if($this->getRequest()->getPost('image')){
            $name = $_FILES['imagefile']['name'];
            $extension = strtolower(substr($name, strpos($name,'.')+1));
            $type = $_FILES['imagefile']['type'];
            $tmp_name = $_FILES['imagefile']['tmp_name'];
            $location = 'Skin/Admin/Product/Image/';

            if (move_uploaded_file($tmp_name,$location.$name)){
                $media = \Mage::getModel('Model\Media');
            	$mediaData = ['image' => $fileName, 'productId' => $productId];
            	$media->setData($mediaData);
            	$media->save();
                
                header("location:".$this->getUrl('form'));
            }
        }


    	if($this->getRequest()->getPost('remove')){
    		$mediaData = $this->getRequest()->getPost('media');
    		$productId = $this->getRequest()->getGet('id');
    		$media = \Mage::getModel('Model\Media');
    		$query = "SELECT * FROM `{$media->getTableName()}` WHERE productId = '{$productId}'";
    		$medias = $media->fetchAll($query);
    		if ($medias) {
    			foreach ($medias->getData() as $media) {
    				if (array_key_exists($media->mediaId, $mediaData['remove'])) {
    					$media->load($media->mediaId);
    					$path = Mage::getbaseDir('Skin\Admin\Product\Image\\') . $media->image;
    					unlink($path);
    					$media->delete();
    				}
    			}
    		}
    		$this->redirect('form','product',['tab' =>'media'],true);
    	}

    	if($this->getRequest()->getPost('update')){
    		$mediaData = $this->getRequest()->getPost('media');
    		$productId = $this->getRequest()->getGet('id');
    		$media = \Mage::getModel('Model\Media');
    		$query = "SELECT * FROM `{$media->getTableName()}` WHERE productId = '{$productId}'";
    		$medias = $media->fetchAll($query);
    		if ($medias) {
    			foreach ($medias->getData() as $media) {
    				$media->small = 0;
    				$media->thumb = 0;
    				$media->base = 0;
    				if ($mediaData['small'] == $media->mediaId) {
    					$media->small = 1;
    				}
    				if ($mediaData['thumb'] == $media->mediaId) {
    					$media->thumb = 1;
    				}
    				if ($mediaData['base'] == $media->mediaId) {
    					$media->base = 1;
    				}
    				if (array_key_exists($media->mediaId, $mediaData['data'])) {
    					$media->label = $mediaData['data'][$media->mediaId]['label'];
    					$media->gallery = 0;
    					if (array_key_exists('gallery', $mediaData['data'][$media->mediaId])) {
    						$media->gallery = 1;
    					}
    				}
    				$media->save();
    			}
    		}
    		$this->redirect('form','product',['tab' =>'media'],true);
    	}
    }
}

?>