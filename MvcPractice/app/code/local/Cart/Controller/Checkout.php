<?php
class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->includeFrontendCss('checkout.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $checkout = $layout->createBlock('cart/checkout');
        $child->addChild('checkout', $checkout);
        $layout->toHtml();
    }
}
?>