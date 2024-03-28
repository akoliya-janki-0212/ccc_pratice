<?php

class Page_Block_Admin_MainContent extends Admin_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('page/admin/mainContent.phtml');
    }
}