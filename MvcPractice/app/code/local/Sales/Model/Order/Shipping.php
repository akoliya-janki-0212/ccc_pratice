<?php
class Sales_Model_Order_Shipping extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Shipping';

        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Shipping';
    }
    public function addOrderShippings(Sales_Model_Order $order, $_shipping)
    {
        $this->setData($_shipping->getData())
            ->addData('order_id', $order->getId())
            ->removeData('quote_id')
            ->removeData('shipping_id')
            ->save();
        return $this;
    }
}
?>