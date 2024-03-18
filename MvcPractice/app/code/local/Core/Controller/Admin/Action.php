<?php
class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{
    protected $_allowedActions = [];

    public function init()
    {
        $layout = $this->getLayout();
        $layout->setTemplate('admin/admin.phtml');
        print_r($layout);
        // $child = $layout->getChild('adminleft');
        // $admin = $layout->createBlock('admin/header');
        // $child->addChild('header', $admin);

        // $child2 = $layout->getChild('content');
        // $adminH = $layout->createBlock('admin/adminheader');
        // $child2->addChild('header', $adminH);
        // if (
        //     !in_array($this->getRequest()->getActionName(), $this->_allowedActions) &&
        //     !Mage::getSingleton('core/session')->get('logged_in_admin_id')
        // ) {
        //     $this->setRedirect('admin/user/login');
        // }
        return $this;
    }
    public function includeAdminCss($file = null)
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('admin/header.css')
            ->addCss('admin/adminMain.css')
            ->addCss('admin/' . $file);
    }
}

?>