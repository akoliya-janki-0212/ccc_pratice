<?php
class Customer_Block_Admin_Order_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/admin/order/list.phtml');
    }
    public function getOrderCollection()
    {
        return Mage::getModel('sales/order')->getCollection()
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