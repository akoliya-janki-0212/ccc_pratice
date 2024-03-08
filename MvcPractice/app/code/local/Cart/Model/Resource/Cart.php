<?php
class Cart_Model_Resource_Cart extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_quote_item', 'item_id');
    }
}
?>