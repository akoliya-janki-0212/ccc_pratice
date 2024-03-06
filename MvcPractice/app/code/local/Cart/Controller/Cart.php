<?php
class Cart_Controller_Cart extends Core_Controller_Front_Action
{

    public function addAction()
    {
        $this->includeCss('cart.scss');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $cart = $layout->createBlock('cart/cart');
        $child->addChild('cart', $cart);
        $layout->toHtml();
    }
}
?>