<?php
class Sales_Model_Order_Item extends Core_Model_Abstract
{
    protected $_product;
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Item';
    }
    public function getProduct()
    {
        if (is_null($this->_product)) {
            $this->_product = Mage::getModel('catalog/product')->load($this->getProductId());
        }
        return $this->_product;
    }
    public function addOrderItems(Sales_Model_Order $order, $_item)
    {
        $this->setData($_item->getData())
            ->addData('order_id', $order->getId())
            ->removeData('quote_id')
            ->removeData('item_id')
            ->save();
        $product = $this->getProduct();
        $currentQty = $product->getInventory();
        $updatedQty = $currentQty - $_item->getQty();
        $product->setData($product->getData())
            ->removeData('inventory')
            ->addData('inventory', $updatedQty)->save();
        return $this;
    }

}
?>