<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->includeCss('banner.css');
        // $layout->getChild('head')->addJs('js/navigation.js');
        //$layout->getChild('head')->addJs('js/page.js');
        $banner = $layout->createBlock('banner/banner');
        $layout->getChild('content')
            ->addChild('banner', $banner);
        $layout->toHtml();

    }
    public function newAction()
    {
        echo dirname(__FILE__);

    }
    public function listAction()
    {
        echo dirname(__FILE__);

    }
    public function saveAction()
    {
        echo dirname(__FILE__);

    }
    public function deleteAction()
    {
        echo dirname(__FILE__);

    }
}
?>