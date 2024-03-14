<?php
class Cart_Controller_Index extends Core_Controller_Front_Action
{

    public function indexAction()
    {

        $this->includeFrontendCss('cart.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $cart = $layout->createBlock('cart/cart');
        $child->addChild('cart', $cart);
        $layout->toHtml();
    }
}
?>