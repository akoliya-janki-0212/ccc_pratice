<?php
class Cart_Block_Checkout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout.phtml');
    }
    public function getAddress()
    {
        return Mage::getModel('customer/address')->getCollection();
    }
}
?>