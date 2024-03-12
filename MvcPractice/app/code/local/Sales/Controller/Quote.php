<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        $data = $this->getRequest()->getParams('cart');
        $quote = Mage::getSingleton('sales/quote')
            ->addProduct($data);
        $this->setRedirect('cart');
    }

    public function deleteAction()
    {
        $quote = Mage::getSingleton('sales/quote')
            ->removeProduct($this->getRequest()->getParams('id'));
        $this->setRedirect('cart');
    }
    public function checkoutAction()
    {
        $data = $this->getRequest()->getParams('sales_quote_customer');
        $quoteCustomer = Mage::getModel('sales/quote_customer')->setData($data);
        $quoteCustomer->save();
    }
}


?>