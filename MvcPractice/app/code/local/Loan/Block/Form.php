<?php
class Loan_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('loan/form.phtml');
    }
    // public function getCategory()
    // {
    //     return Mage::getModel('catalog/category')->load($this->getRequest()->getParams('id', 0));
    // }
}
?>