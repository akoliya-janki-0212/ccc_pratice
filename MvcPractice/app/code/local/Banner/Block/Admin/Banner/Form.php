<?php
class Banner_Block_Admin_Banner_Form extends Admin_Block_Layout
{
    public function __construct()
    {
        $this->setTemplate('banner/admin/form.phtml');
    }
    public function getBanner()
    {
        return Mage::getModel('banner/banner')->load($this->getRequest()->getParams('id', 0));
    }
}
?>