<?php
class Customer_Controller_Address extends Core_Controller_Front_Action
{
    public function index()
    {
        echo dirname(__FILE__);

    }
    public function new()
    {
        echo dirname(__FILE__);

    }
    public function list()
    {
        echo dirname(__FILE__);

    }
    public function saveAction()
    {
        $addressData = $this->getRequest()->getParams('address');
        Mage::getModel('customer/address')->setData($addressData)->save();
    }
    public function delete()
    {
        echo dirname(__FILE__);

    }
}
?>