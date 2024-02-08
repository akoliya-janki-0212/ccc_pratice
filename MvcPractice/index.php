<?php
include 'app/Mage.php';
include 'app/code/Local/autoload.php';
class Ccc
{
    public static function init()
    {
        Mage::init();
    }
}
Ccc::init();
?>