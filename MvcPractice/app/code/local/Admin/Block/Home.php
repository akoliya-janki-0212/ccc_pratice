<?php

class Admin_Block_Home extends Admin_Block_Layout
{

   public function __construct()
   {
      $this->setTemplate('page/admin/home.phtml');
   }

}