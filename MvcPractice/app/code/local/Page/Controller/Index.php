<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo dirname(__FILE__);
        $layout=$this->getLayout()->toHtml();
        print_r($layout);die;

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