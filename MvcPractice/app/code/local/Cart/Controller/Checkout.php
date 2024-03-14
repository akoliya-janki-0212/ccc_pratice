<?php
class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->includeFrontendCss('checkout.css');
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('jquery-3.7.1.js');
        $child = $layout->getChild('content');
        $checkout = $layout->createBlock('cart/checkout');
        $child->addChild('checkout', $checkout);
        $layout->toHtml();
    }
}
?>