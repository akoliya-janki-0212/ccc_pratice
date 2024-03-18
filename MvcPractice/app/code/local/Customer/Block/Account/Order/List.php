<?php
class Customer_Block_Account_Order_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/account/order/list.phtml');
    }
    public function getOrderCollection()
    {
        return Mage::getModel('sales/order')->getCollection()
            ->addFieldToFilter('customer_id', Mage::getSingleton('core/session')->get('logged_in_customer_id'))
            ->getData();
    }

    public function getItems()
    {
        $_items = [];
        if ($this->getOrderCollection()) {
            foreach ($this->getOrderCollection() as $_order) {
                $_items[] = Mage::getModel('sales/order')->getItemsCollection($_order)->getData();
            }
        }
        return $_items;
    }
}
?>