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
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getData();
    }
    public function getShippingCollection()
    {
        return Mage::getSingleton('sales/quote_shipping')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    public function getPaymentCollection()
    {
        return Mage::getSingleton('sales/quote_payment')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    public function getCustomerCollection()
    {
        return Mage::getSingleton('sales/quote_customer')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    public function getQuoteCollection()
    {
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        if ($customerId) {
            return Mage::getSingleton('sales/quote')
                ->getCollection()
                ->addFieldToFilter('customer_id', $customerId)
                ->addFieldToFilter('order_id', 0)
                ->getFirstItem();
        } else {
            return null;
        }
    }
    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection() as $_item) {
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
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        if (!$quoteId) {
            $quote = Mage::getModel('sales/quote')
                ->setData([
                    'tax_percent' => 8,
                    'grand_total' => 0,
                ]);
            if (!is_null($this->getQuoteCollection())) {
                $quoteId = $this->getQuoteCollection()->getQuoteId();
                $quote->addData('quote_id', $quoteId);
            }
            $quote->save();
            Mage::getSingleton('core/session')
                ->set('quote_id', $quote->getId());
            $quoteId = $quote->getId();
            $this->load($quoteId);
        } else {
            if ($customerId) {
                $quoteModel = Mage::getModel('sales/quote')->load($quoteId);
                $quoteModel->addData('customer_id', $customerId)->save();
                $quoteId = $quoteModel->getId();
            }
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
                    isset ($requestData['item_id'])
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

    public function addAddress($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_customer')->addAddressMethod($this, $data);
        }
        $this->save();
    }
    public function addShipping($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            $shippingId = Mage::getModel('sales/quote_shipping')->addShippingMethod($this, $data)->getId();
            $this->addData("shipping_id", $shippingId);
        }
        $this->save();
    }
    public function addPayment($data)
    {
        $this->initQuote();
        if ($this->getId()) {
            $paymentId = Mage::getModel('sales/quote_payment')->addPaymentMethod($this, $data)->getId();
            $this->addData('payment_id', $paymentId);
        }
        $this->save();
    }
    public function convertToOrder()
    {
        $this->initQuote();
        if ($this->getId()) {
            $orderModel = Mage::getModel("sales/order");
            $orderId = $orderModel->addOrder($this)->getId();
            if ($this->getItemCollection()) {
                $orderModel->addOrderItem($this);
            }
            if ($this->getCustomerCollection()) {
                $orderModel->addOrderCustomer($this);
            }
            if ($this->getShippingCollection()) {
                $orderModel->addOrderShipping($this);
            }
            if ($this->getPaymentCollection()) {
                $orderModel->addOrderPayment($this);
            }
            $this->addData('order_id', $orderId)->
                addData('is_ordered', 1)->save();
            Mage::getSingleton('core/session')->remove('quote_id');
        }
        return $this;
    }
}
?>