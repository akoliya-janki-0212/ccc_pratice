<?php
class Cart_Model_Cart extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Cart_Model_Resource_Cart';
        $this->_collectionClass = 'Cart_Model_Resource_Collection_Cart';
    }
}
?>