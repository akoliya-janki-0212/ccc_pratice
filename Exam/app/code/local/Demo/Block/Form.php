<?php
class Demo_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('demo/file.phtml');
    }
    public function getParentDropDown()
    {
        $ddl = [];
        $parentCollection = Mage::getModel('demo/parent')->getCollection()->getData();
        foreach ($parentCollection as $_data) {
            $ddl[$_data->getId()] = $_data->getName();
        }
        return $ddl;
    }
}
?>