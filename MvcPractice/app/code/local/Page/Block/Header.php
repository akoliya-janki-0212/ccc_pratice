<?php
class Page_Block_Header extends Core_Block_Template
{

    public function __construct()
    {
        $this->setTemplate('page/header.phtml');
    }
    public function itemsCount()
    {
        // return Mage::getModel('sales/quote')->initQuote()->getItemCount();
        return Mage::getModel('sales/quote')->initQuote()->getItemCount('item_id', 'total_items');
    }

}

?>