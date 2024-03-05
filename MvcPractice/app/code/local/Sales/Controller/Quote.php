<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        $data = $this->getRequest()->getParams('product');
        $data = $data + ["item_id" => 7];
        $quote = Mage::getSingleton('sales/quote')->addProduct($data);
    }

    public function deleteAction()
    {
        $request = ["item_id" => 6];
        $quote = Mage::getSingleton('sales/quote')->removeProduct($request);
    }
}


?>