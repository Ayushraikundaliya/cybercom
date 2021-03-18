<?php

namespace Block\Admin\Customer\Edit\Tabs;
\Mage::getBlock('Block\Admin\Core\Template');

class Address extends\Block\Admin\Core\Template{
	protected $address = null;

	public function __construct() {
		parent::__construct();
		$this->setTemplate('./View/admin/customer/edit/tabs/address.php');
	}

	public function setAddress($address = NULL) {
        if($address){
            $this->address = $address;
            return $this;
        }
        $customer = \Mage::getModel('Model\Customer');    
        if(($id = $this->getRequest()->getGet('customerId'))) {
            $customer = $customer->load($id);
            $this->customer = $customer;
            
            $query = "SELECT * FROM `customer_address` WHERE `customerId`={$id}";
            $array = $customer->fetchAll($query);
            if($array){
                foreach($array as $key=>$value){
                    $this->address[] = $value->getData();
                }
            }
        }      
        return $this;
    }
    
    public function getAddress() {
        if (!$this->address){
            $this->setAddress();
        }
        return $this->address;
    } 
}

?>