<?php
class Customer_Model_Address extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Customer_Model_Resource_Address';
        $this->_collectionClass = 'Customer_Model_Resource_Collection_Address';

    }
    public function _beforeSave()
    {
        $this->addData('customer_id', Mage::getModel('core/session')->get('logged_in_customer_id', 0));
    }
}
?>