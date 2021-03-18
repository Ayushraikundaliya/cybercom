<?php

namespace Controller\Admin;
\Mage::getController('Controller\Admin\Core\Admin');

class Category extends Core\Admin {
	protected $categoryModel = null;

	public function setCategoryModel($categoryModel = Null) {
		if(!$categoryModel) {
			$this->categoryModel = $categoryModel;
		}
		$this->categoryModel = \Mage::getModel('Model\Category');
		return $this;
	}

	public function getCategoryModel() {
		if(!$this->categoryModel) {
			$this->setCategoryModel();
		}
		return $this->categoryModel;
	}

	public function gridAction() {
		try {
			$gridBlock = \Mage::getBlock('Block\Admin\Category\Grid');
			$layout = $this->getLayout();
			$grid = $layout->getChild('content');
			$grid->addChild($gridBlock,'grid');
			$this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function formAction() {
		try {
			$editBlock = \Mage::getBlock('Block\Admin\Category\Edit');
            $layout = $this->getLayout();
            $layout->getLeft()->addChild(\Mage::getBlock('Block\Admin\Category\Edit\Tabs'));
            $layout->setTemplate('./View/admin/core/layout/twoColumn.php');
            $edit = $layout->getChild('content');
            $edit->addChild($editBlock,'edit');
            $this->renderLayout();
		} catch (Exception $e) {
			
		}
	}

	public function saveAction()
    { 
    	try {
            $category = $this->getCategoryModel();
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalide Request.");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $category  = $category->load($id);
                if (!$category) {
                    throw new Exception("Record not found.");
                }
            }

            $categorypathId = $category->pathId;
            $postDate = $this->getRequest()->getPost('category');
            $category->setData($postDate);
            $category->save();
            $category->updatePathId();
            $category->updateChildrenPathIds($categorypathId);
        } catch (Exception $e) {

        }
        $this->redirect('grid');
    }

	public function deleteAction() {
		try {
            $category=\Mage::getModel("Model\Category");

            if ($categoryId = $this->getRequest()->getGet('id')) {
                $category = $category->load($categoryId);
                if (!$category) {
                    throw new Exception("Id is Invalid");
                }
            }
            $pathId = $category->pathId;
            $parentId = $category->parentId;
            $category->updateChildrenPathIds($pathId, $parentId, $categoryId);
            $categoryData = $this->request->getGet();
			$category->setData($categoryData);
			if($category->deleteData($categoryData['id'])) {
				//$this->getMessage()->setSuccess('Record Delete Successfully.');
			} else {
				//$this->getMessage()->setFailure('Record Not Deleted.');
			}
        }  
        catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }   
        $this->redirect('grid');
    }
}

?>