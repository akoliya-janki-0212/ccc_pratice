<?php
class Customer_Block_Account_Login_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/account/login/form.phtml');
    }
    public function getField()
    {
        return $this->getRender('text', [
            'id' => 'name',
            'name' => 'name',
            'place_holder' => 'Enter Name'
        ]);
    }
}
?>