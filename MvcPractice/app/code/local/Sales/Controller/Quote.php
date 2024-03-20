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
            if (isset ($_POST['save_address'])) {
                $data = $this->getRequest()->getParams('address');
                if (!empty ($data)) {
                    Mage::getSingleton('sales/quote')->addAddress($data);
                }
            }
            if (isset ($_POST['save_shipping_method'])) {
                $shippingData = $this->getRequest()->getParams('shipping');
                if (!empty ($shippingData)) {
                    Mage::getSingleton('sales/quote')->addShipping($shippingData);
                }
            }
            if (isset ($_POST['save_payment_method'])) {
                $paymentData = $this->getRequest()->getParams('payment');
                if (!empty ($paymentData)) {
                    Mage::getSingleton('sales/quote')->addPayment($paymentData);
                }
            }
            // $this->setRedirect('cart/checkout');
            if (isset ($_POST['place_order'])) {
                Mage::getSingleton('sales/quote')->convertToOrder();
                echo "<script>alert('Order placed successfully')</script>";
                // $this->setRedirect('');
            }
        } else {
            // $this->setRedirect('cart');
        }
    }
}


?>