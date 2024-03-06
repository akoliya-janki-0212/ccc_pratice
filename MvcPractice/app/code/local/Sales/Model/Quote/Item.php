<?php
class Sales_Model_Quote_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Item';
    }
    public function getProduct()
    {
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }
    protected function _beforeSave()
    {
        if ($this->getProductId()) {
            $price = $this->getProduct()->getPrice();
            $this->addData('price', $price);
            $this->addData('row_total', $price * $this->getQty());
        }
    }
    public function addItem(Sales_Model_Quote $quote, $productId, $qty)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        if ($item) {
            $qty = $qty + $item->getQty();
        }
        $this->setData([
            'quote_id' => $quote->getId(),
            'product_id' => $productId,
            'qty' => $qty
        ]);
        if ($item) {
            $this->setId($item->getId());
        }
        $this->save();
        return $this;
    }
    public function editItem(Sales_Model_Quote $quote, $request)
    {

        $item = $this->getCollection()
            ->addFieldToFilter('item_id', $request['item_id'])
            ->addFieldToFilter('product_id', $request['product_id'])
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        if ($item) {
            $qty = $request['qty'];
        }
        $this->setData([
            'item_id' => $request['item_id'],
            'quote_id' => $quote->getId(),
            'product_id' => $request['product_id'],
            'qty' => $qty
        ]);
        $this->save();
        return $this;
    }
    public function removeItem(Sales_Model_Quote $quote, $item_id)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('quote_id', $quote->getId())
            ->addFieldToFilter('item_id', $item_id)
            ->getFirstItem()
            ->delete();
        return $this;
    }
}
?>