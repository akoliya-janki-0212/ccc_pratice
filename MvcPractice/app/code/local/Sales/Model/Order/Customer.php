<?php
class Sales_Model_Order_Customer extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Customer';

        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Customer';
    }
    public function addOrderCustomers(Sales_Model_Order $order, $_customer)
    {
        $this->setData($_customer->getData())
            ->addData('order_id', $order->getId())
            ->removeData('quote_id')
            ->removeData('quote_customer_id')
            ->save();
        return $this;
    }
}
?>