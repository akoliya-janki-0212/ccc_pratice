<?php
class Sales_Model_Quote_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Customer';

        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Customer';
    }
    public function getCustomer()
    {
        return Mage::getModel('customer/customer')->load($this->getCustomerId());
    }
    protected function _beforeSave()
    {
        $this->addData('customer_id', Mage::getSingleton('core/session')->get('logged_in_customer_id'));
        $this->addData('quote_id', Mage::getSingleton('core/session')->get('quote_id'));
        $this->addData('email', $this->getCustomer()->getCustomerEmail());
    }
}
?>