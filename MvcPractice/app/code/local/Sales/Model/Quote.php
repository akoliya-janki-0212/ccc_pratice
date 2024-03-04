<?php
class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';

        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
    }
    public function initQuote()
    {
        $quoteId = Mage::getSingleton("core/session")->get("quote_id");
        $this->load($quoteId);
        if (!$this->getID()) {
            $quote = Mage::getModel('sales/quote')
                ->setData(
                    [
                        "tax-percent" => 8,
                        "grand_total" => 0
                    ]
                )->save();

        }

    }
    public function addProduct($reuqest)
    {
        $this->initQuote();
    }
}
?>