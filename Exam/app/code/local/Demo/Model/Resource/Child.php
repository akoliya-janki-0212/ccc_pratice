<?php
class Demo_Model_Resource_Child extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('child', 'child_id');
    }
}
?>