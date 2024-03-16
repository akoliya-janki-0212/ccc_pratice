<?php
class Sales_Model_Order_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Item';
    }
    public function addOrderItems(Sales_Model_Order $order, $_item)
    {
        $this->setData($_item->getData())
            ->addData('order_id', $order->getId())
            ->removeData('quote_id')
            ->removeData('item_id')
            ->save();
        return $this;
    }

}
?>