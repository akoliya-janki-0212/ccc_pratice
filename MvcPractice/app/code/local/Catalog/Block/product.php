<?php
class Catalog_Block_Product extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/form.phtml');
    }
    public function getProduct()
    {
        $id = $this->getRequest()->getParams('id');
        return Mage::getModel('catalog/product')->getCollection()
            ->addFieldToFilter('product_id', $id)
            ->getFirstItem();
    }
    public function getSimilerProduct()
    {
        return Mage::getModel('catalog/product')->getCollection()
            ->addFieldToFilter('category_id', ($this->getProduct()->getCategoryId()))
            ->getData();
    }
}
?>