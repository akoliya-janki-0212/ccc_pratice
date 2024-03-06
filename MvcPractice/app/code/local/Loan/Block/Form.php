<?php
class Loan_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('loan/form.phtml');
    }
    public function getSession()
    {
        return Mage::getSingleton('core/session')->getId();
    }
    public function getUser()
    {
        return Mage::getSingleton('core/session')->get("user_name");
    }
}
?>