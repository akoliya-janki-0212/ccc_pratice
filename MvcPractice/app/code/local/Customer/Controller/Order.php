<?php
class Customer_Controller_Order extends Core_Controller_Front_Action
{
    public function listAction()
    {
        $this->includeFrontendCss('orderList.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $orderForm = $layout->createBlock('customer/account_order_list');
        $child->addChild('form', $orderForm);
        $layout->toHtml();
    }
    public function viewAction()
    {
        $this->includeFrontendCss('orderView.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $orderForm = $layout->createBlock('customer/account_order_view');
        $child->addChild('form', $orderForm);
        $layout->toHtml();
    }
}


?>