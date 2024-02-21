<?php
class Page_Block_Header extends Core_Block_Template
{

    public function __construct()
    {
        $this->setTemplate('page/header.phtml');
    }
    public function getImageUrl($file)
    {
        return Mage::getBaseUrl('images/') . $file;
    }
}

?>