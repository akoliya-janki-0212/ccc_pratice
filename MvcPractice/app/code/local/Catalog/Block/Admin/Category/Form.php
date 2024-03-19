<?php
class Catalog_Block_Admin_Category_Form extends Admin_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('catalog/admin/category/form.phtml');
    }
    public function getCategory()
    {
        return Mage::getModel('catalog/category')->load($this->getRequest()->getParams('id', 0));
    }
}
?>