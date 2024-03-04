<?php
class Core_Controller_Front_Action
{
    protected $_layout = null;
    public function __construct()
    {
        $this->init();
    }
    public function includeCss($file = null)
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('content.css')
            ->addCss($file)
            ->addCss('footer.css');
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
        return $this;
    }
}

?>