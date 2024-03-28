<?php
class Demo_Model_Parent extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Demo_Model_Resource_Parent';
        $this->_collectionClass = 'Demo_Model_Resource_Collection_Parent';
    }

}
?>