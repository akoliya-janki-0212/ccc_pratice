<?php

class Page_Block_Admin_Content extends Admin_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('page/admin/content.phtml');
    }
}