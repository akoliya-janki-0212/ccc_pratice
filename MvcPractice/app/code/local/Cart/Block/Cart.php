<?php
class Cart_Block_Cart extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/cart.phtml');
    }
    public function getQuoteItem()
    {
        return Mage::getModel('sales/quote')->initQuote()->getItemCollection();
    }
    public function getQuote()
    {
        $quoteId = Mage::getSingleton('core/session')
            ->get('quote_id');
        return Mage::getModel('sales/quote')->getCollection()
            ->addFieldToFilter("quote_id", $quoteId)
            ->getFirstItem();
    }
}
?>