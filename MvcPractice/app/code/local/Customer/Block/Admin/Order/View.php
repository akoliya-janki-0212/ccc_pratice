<?php
class Customer_Block_Admin_Order_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/admin/order/view.phtml');
    }
    public function getId()
    {
        return $this->getRequest()->getParams('id');
    }
    public function getOrderCollection()
    {
        return Mage::getModel('sales/order')->getCollection()
            ->addFieldToFilter('order_id', $this->getId())
            ->getFirstItem();
    }
    public function getItem()
    {
        return Mage::getModel('sales/order')
            ->getItemsCollection($this->getOrderCollection())
            ->getFirstItem();
    }
    public function getCustomer()
    {
        return Mage::getModel('sales/order')
            ->getCustomerCollection($this->getOrderCollection())
            ->getFirstItem();
    }
    public function getAddress()
    {
        return Mage::getModel('sales/order')
            ->getAddress($this->getOrderCollection())
            ->getFirstItem();
    }
}
?>