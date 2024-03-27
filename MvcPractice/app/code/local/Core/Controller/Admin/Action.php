<?php
class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{
    protected $_allowedActions = [];

    public function init()
    {
        $this->getLayout();
        /* if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedActions) &&
            !Mage::getSingleton('core/session')->get('logged_in_admin_id')
        ) {
            $this->setRedirect('admin/user/login');
        } */
        return $this;
    }
    public function getLayout()
    {
        if (is_null($this->_layout)) {
            $this->_layout = Mage::getBlock('admin/layout');
        }
        return $this->_layout;
    }
    public function includeAdminCss($file = null)
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('admin/adminMain.css')
            ->addCss('admin/' . $file);
    }
}

?>