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
    public function addAddressMethod(Sales_Model_Quote $quote, $address)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        $this->setData(
            $address
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->addData('quote_id', $quote->getId());
        $this->addData('customer_id', Mage::getSingleton('core/session')->get('logged_in_customer_id'));
        $this->addData('email', $this->getCustomer()->getCustomerEmail());
        $this->save();
        return $this;
    }
}
?>