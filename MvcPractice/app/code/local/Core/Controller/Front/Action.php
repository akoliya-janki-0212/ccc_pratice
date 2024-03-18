<?php
class Core_Controller_Front_Action
{
    protected $_layout = null;
    protected $_allowedActions = [];
    public function __construct()
    {
        session_start();
        $this->init();
    }
    public function includeFrontendCss($file = null)
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('frontend/bootstrap.min.css')
            ->addCss('frontend/font-awesome.min.css')
            ->addCss('frontend/elegant-icons.css')
            ->addCss('frontend/jquery- ui.min.css')
            ->addCss('frontend/magnific-popup.css')
            ->addCss('frontend/owl.carousel.min.css')
            ->addCss('frontend/slicknav.min.css')
            ->addCss('frontend/header.css')
            ->addCss('frontend/footer.css')
            ->addCss('frontend/style.css')
            ->addCss('frontend/' . $file);
    }
    public function getLayout()
    {
        if (is_null($this->_layout)) {
            $this->_layout = Mage::getBlock('core/layout');
        }
        return $this->_layout;
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
    public function setRedirect($url)
    {
        echo "<script>location.href='" . Mage::getBaseUrl() . '/' . $url . "'</script>";
    }
    public function init()
    {
        // if (
        //     !in_array($this->getRequest()->getActionName(), $this->_allowedActions) &&
        //     !Mage::getSingleton('core/session')->get('logged_in_customer_id')
        // ) {
        //     $this->setRedirect('customer/account/login');
        // }
    }
}