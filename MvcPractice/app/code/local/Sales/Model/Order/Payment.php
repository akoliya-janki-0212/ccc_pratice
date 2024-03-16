<?php
class Sales_Model_Order_Payment extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Payment';

        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Payment';
    }
    public function addOrderPayments(Sales_Model_Order $order, $_payment)
    {

        $this->setData($_payment->getData())
            ->addData('order_id', $order->getId())
            ->removeData('quote_id')
            ->removeData('payment_id')
            ->save();
        return $this;
    }
}
?>