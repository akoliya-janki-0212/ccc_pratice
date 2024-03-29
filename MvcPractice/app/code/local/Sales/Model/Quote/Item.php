<?php
class Sales_Model_Quote_Item extends Core_Model_Abstract
{
    protected $_product;
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Item';
    }
    public function getProduct()
    {
        if (is_null(($this->_product))) {
            $this->_product = Mage::getModel('catalog/product')->load($this->getProductId());
        }
        return $this->_product;
    }
    protected function _beforeSave()
    {
        if ($this->getProductId()) {
            $price = $this->getProduct()->getPrice();
            $this->addData('price', $price);
            $this->addData('row_total', $price * $this->getQty());
        }
    }
    public function addItem(Sales_Model_Quote $quote, $productId, $qty, $itemId)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        if ($item) {
            if (!$itemId) {
                $qty += $item->getQty();
                $this->setId($item->getId());
            } else {
                $this->setId($itemId);
            }
        }
        $this->addData('product_id', $productId)
            ->addData('quote_id', $quote->getId())
            ->addData('qty', $qty);
        $this->save();
        return $this;
    }
    public function removeItem(Sales_Model_Quote $quote, $item_id)
    {
        $this->getCollection()
            ->addFieldToFilter('quote_id', $quote->getId())
            ->addFieldToFilter('item_id', $item_id)
            ->getFirstItem()
            ->delete();
        return $this;
    }
}
?>