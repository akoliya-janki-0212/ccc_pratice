<?php
class Catalog_Block_Admin_Product_Form extends Admin_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('catalog/admin/product/form.phtml');
    }
    public function getProduct()
    {
        return Mage::getModel('catalog/product')->load($this->getRequest()->getParams('id', 0));
    }

    /*  public function getCategory()
     {
         return Mage::getModel('catalog/category')->getCollection()->getData();
     } */
}
?>