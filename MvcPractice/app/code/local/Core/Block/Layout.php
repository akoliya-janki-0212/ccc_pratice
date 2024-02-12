<?php
class Core_Block_Layout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('Core/1column.phtml');

    }
    public function prepareChildren()
    {
    }
    public function createBlock($className)
    {
        Mage::getBlock('page/header');
    }
    public function getRequest(){
        return Mage::getModel('core/request');
    }
}
?>