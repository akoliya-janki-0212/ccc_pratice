<?php
class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    public function listAction()
    {
        $this->includeAdminCss('orderList.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $mainChild = $child->getChild('maincontent');
        $orderForm = $layout->createBlock('customer/admin_order_list');
        $mainChild->addChild('form', $orderForm);
        $layout->toHtml();
    }
    public function viewAction()
    {
        $this->includeAdminCss('orderView.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $mainChild = $child->getChild('maincontent');
        $orderForm = $layout->createBlock('customer/admin_order_view');
        $mainChild->addChild('form', $orderForm);
        $layout->toHtml();
    }
}


?>