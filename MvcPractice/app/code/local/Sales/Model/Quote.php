<?php
class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';

        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
    }
    public function getItemCollection()
    {
        $this->initQuote();
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());

    }
    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection()->getData() as $_item) {
            $grandTotal += $_item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal = $grandTotal + $tax;
        }
        $this->addData('grand_total', $grandTotal);

    }

    public function initQuote()
    {
        $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");
        $quoteId = Mage::getSingleton("core/session")->get("quote_id");
        $this->load($quoteId);
        if (!$this->getId()) {
            $quote = Mage::getModel('sales/quote')
                ->setData(
                    [
                        "tax_percent" => 8,
                        "grand_total" => 0
                    ]
                )->save();
            Mage::getSingleton('core/session')->set("quote_id", $quote->getId());
            $quoteId = $quote->getId();
            $this->load($quoteId);
        }
        return $this;
    }
    public function addProduct($requestData)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")
                ->addItem(
                    $this,
                    $requestData['product_id'],
                    $requestData['qty'],
                    isset($requestData['item_id'])
                    ? $requestData['item_id']
                    : null
                );
        }
        $this->save();
        return $this;
    }
    public function removeProduct($id)
    {
        $quoteId = Mage::getSingleton("core/session")->get("quote_id");
        $this->load($quoteId);
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')->removeItem($this, $id);
        }
        $this->save();
        return $this;
    }
    public function getAddressCollection()
    {
        return Mage::getSingleton('sales/quote_customer')
            ->getCollection()
            ->addFieldToFilter('quote_id', Mage::getSingleton('core/session')
                ->get('quote_id'))
            ->getFirstItem();
    }
    public function addAddress($data)
    {
        $quoteCustomerId = 0;
        $addrerssCollection = $this->getAddressCollection();
        if ($addrerssCollection) {
            $quoteCustomerId = $addrerssCollection->getQuoteCustomerId();
        }
        $addrerssModel = Mage::getModel('sales/quote_customer');
        $addrerssModel->setData($data);

        if ($quoteCustomerId) {
            $addrerssModel->addData('quote_customer_id', $quoteCustomerId)
                ->save();
        } else {
            $addrerssModel->save();
            $quoteCustomerId = $addrerssModel->getId();
            Mage::getSingleton('core/session')->set('quote_customer_id', $quoteCustomerId);
        }
    }
    public function getShippingCollection()
    {
        return Mage::getModel('sales/quote_shipping')
            ->getCollection()
            ->addFieldToFilter('quote_id', Mage::getSingleton('core/session')
                ->get('quote_id'))
            ->getFirstItem();
    }
    public function addShipping($data)
    {
        $shippingId = 0;
        $shippingCollection = $this->getShippingCollection();
        if ($shippingCollection) {
            $shippingId = $shippingCollection->getShippingId();
        }
        $shippingModel = Mage::getModel('sales/quote_shipping');
        $shippingModel->setData($data);
        if ($shippingId) {
            $shippingModel->addData('shipping_id', $shippingId)->save();
        } else {
            $shippingModel->save();
        }
    }
    public function getPaymentCollection()
    {
        return Mage::getModel('sales/quote_payment')
            ->getCollection()
            ->addFieldToFilter('quote_id', Mage::getSingleton('core/session')
                ->get('quote_id'))
            ->getFirstItem();
    }
    public function addPayment($data)
    {
        $paymentId = 0;
        $paymentCollection = $this->getPaymentCollection();
        if ($paymentCollection) {
            $paymentId = $paymentCollection->getPaymentId();
        }
        $paymentModel = Mage::getModel('sales/quote_payment');
        $paymentModel->setData($data);
        if ($paymentId) {
            $paymentModel->addData('payment_id', $paymentId)->save();
        } else {
            $paymentModel->save();
        }
    }
    public function getQuoteItemCollection()
    {
        return Mage::getSingleton('sales/quote_item')
            ->getCollection()
            ->addFieldToFilter('quote_id', Mage::getSingleton('core/session')
                ->get('quote_id'))
            ->getData();
    }
    public function getQuoteCustomerCollection()
    {
        return Mage::getSingleton('sales/quote_customer')
            ->getCollection()
            ->addFieldToFilter('quote_id', Mage::getSingleton('core/session')
                ->get('quote_id'))
            ->getFirstItem();
    }
    public function convertToOrder()
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/order")
                ->setData($this->getData())
                ->removeData('quote_id')
                ->removeData('order_id')
                ->save();
            foreach ($this->getQuoteItemCollection() as $_item) {
                Mage::getModel("sales/order_item")
                    ->setData($_item->getData())
                    ->removeData('quote_id')
                    ->removeData('item_id')
                    ->save();
            }
            Mage::getModel("sales/order_customer")
                ->setData($this->getQuoteCustomerCollection()->getData())
                ->removeData('quote_id')
                ->removeData('quote_customer_id')
                ->save();
        }
    }
}
?>