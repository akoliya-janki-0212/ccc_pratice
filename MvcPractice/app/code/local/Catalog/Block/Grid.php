<?php
class Catalog_Block_Grid extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/grid.phtml');
    }
    public function getCategores()
    {
        return Mage::getModel('catalog/category')
            ->getCollection()
            ->getData();
    }
    public function getProducts()
    {
        $id = $this->getRequest()->getParams('id');
        if ($id) {
            return Mage::getModel('catalog/product')->getCollection()
                ->addFieldToFilter('category_id', $id)
                ->getData();
        } else {
            return Mage::getModel('catalog/product')->getCollection()
                ->getData();
        }
    }
}
?>