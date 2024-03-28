<?php
class Demo_Model_Child extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Demo_Model_Resource_Child';
        $this->_collectionClass = 'Demo_Model_Resource_Collection_Child';
    }

}
?>