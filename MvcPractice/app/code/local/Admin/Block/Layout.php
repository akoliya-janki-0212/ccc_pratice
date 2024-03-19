<?php

class Admin_Block_Layout extends Core_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('core/admin.phtml');
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $head = $this->createBlock('page/admin_head');
        $this->addChild('head', $head);

        $header = $this->createBlock('page/admin_left');
        $this->addChild('left', $header);

        $content = $this->createBlock('page/admin_content');
        $this->addChild('content', $content);

        $childContent = $this->getChild('content');
        $header = $this->createBlock('page/admin_header');
        $childContent->addChild('header', $header);

        $content = $this->createBlock('page/admin_maincontent');
        $childContent->addChild('maincontent', $content);

        $content = $this->createBlock('page/admin_statusbar');
        $childContent->addChild('statusbar', $content);
    }
    public function createBlock($className)
    {
        return Mage::getBlock($className);
    }

}