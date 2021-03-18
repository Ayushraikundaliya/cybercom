<?php

namespace Controller\Admin\Product;
\Mage::getController('Controller\Admin\Core\Admin');

class Media extends \Controller\Admin\Core\Admin{

	public function mediaAction() {
		try {
            $product = \Mage::getModel('Model\Product');
            $productId = $this->getRequest()->getGet('id');

            if (!$productId) {
                throw new Exception("Id not is Available.", 1);
            }
            if (!$product->load($productId)) {
                throw new Exception("No Product For Given Id", 1);
            }
            $file = $_FILES['img']['name']['image'];
            $ext = end((explode(".", $file)));
            $temp_name = $_FILES['img']['tmp_name']['image'];
            $filePath = Mage::getbaseDir('skin\product\image\\');
            $fileName = time() . '_' . $productId . '.' . $ext;
            move_uploaded_file($temp_name, $filePath . $fileName);
            $media = Mage::getModel('Model_Media');
            $mediaData = ['image' => $fileName, 'productId' => $productId];
            $media->setData($mediaData);
            $media->save();
            $this->redirect('index');
        } catch (Exception $e) {
        }
	}

	public function updateAction()
    {
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

    public function removeAction()
    {
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
}

?>