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
        $quoteId = Mage::getSingleton('core/session')->get("quote_id");
        if ($quoteId) {
            $data = $this->getRequest()->getParams('address');
            if (!empty($data)) {
                Mage::getSingleton('sales/quote')->addAddress($data);
            }
        } else {
            $this->setRedirect('cart');
        }
        $shippingData = $this->getRequest()->getParams('shipping');
        if (!empty($shippingData)) {
            Mage::getSingleton('sales/quote')->addShipping($shippingData);
        }
        $paymentData = $this->getRequest()->getParams('payment');
        if (!empty($paymentData)) {
            Mage::getSingleton('sales/quote')->addPayment($paymentData);
        }
        Mage::getSingleton('sales/quote')->convertToOrder($paymentData);
    }
}


?>