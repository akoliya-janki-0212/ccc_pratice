<?php

class Page_Block_Admin_Header extends Admin_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('page/admin/header.phtml');
    }
}