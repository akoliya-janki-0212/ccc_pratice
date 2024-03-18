<?php
class Sales_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order';

        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
    }

    public function getItemsCollection(Sales_Model_Order $_order)
    {
        return Mage::getModel('sales/order_item')->getCollection()
            ->addFieldToFilter('order_id', $_order->getOrderId());
    }

    public function getCustomerCollection(Sales_Model_Order $_order)
    {
        return Mage::getModel('customer/customer')->getCollection()
            ->addFieldToFilter('customer_id', $_order->getCustomerId());
    }
    public function getAddress(Sales_Model_Order $_order)
    {
        return Mage::getModel('sales/order_customer')->getCollection()
            ->addFieldToFilter('order_id', $_order->getOrderId());
    }

    public function _beforeSave()
    {
        $orderNumber = rand(1000000, 9999999);
        $flag = True;
        while ($flag) {
            $existOrderNumber = Mage::getModel('sales/order')
                ->getCollection()
                ->addFieldToFilter('order_number', $orderNumber)
                ->getFirstItem();
            if (!$existOrderNumber) {
                $flag = False;
            }
            $orderNumber = rand(1000000, 9999999);
        }
        $this->addData('order_number', $orderNumber);
    }
    public function addOrder(Sales_Model_Quote $quote)
    {
        $this->setData($quote->getData())
            ->removeData('quote_id')
            ->removeData('order_id')
            ->removeData('shipping_id')
            ->removeData('payment_id')
            ->removeData('is_ordered')
            ->save();
        return $this;
    }
    public function addOrderItem(Sales_Model_Quote $quote)
    {
        if ($this->getId()) {
            foreach ($quote->getItemCollection() as $_item) {
                Mage::getModel("sales/order_item")
                    ->addOrderItems($this, $_item);
            }
        }
        return $this;
    }
    public function addOrderCustomer(Sales_Model_Quote $quote)
    {
        if ($this->getId()) {
            Mage::getModel("sales/order_customer")
                ->addOrderCustomers($this, $quote->getCustomerCollection());
        }
        return $this;
    }
    public function addOrderPayment(Sales_Model_Quote $quote)
    {
        if ($this->getId()) {
            $paymentId = Mage::getModel("sales/order_payment")
                ->addOrderPayments($this, $quote->getPaymentCollection())->getId();
            $this->addData('payment_id', $paymentId)->save();
        }
        return $this;
    }
    public function addOrderShipping(Sales_Model_Quote $quote)
    {
        if ($this->getId()) {
            $shippingId = Mage::getModel("sales/order_shipping")
                ->addOrderShippings($this, $quote->getShippingCollection())->getId();
            $this->addData('shipping_id', $shippingId)->save();
        }
        return $this;
    }
}
?>