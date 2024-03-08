<?php
class Cart_Controller_index extends Core_Controller_Front_Action
{

    public function indexAction()
    {
        Mage::getSingleton('core/session');
        $this->includeFrontendCss('cart.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $cart = $layout->createBlock('cart/cart');
        $child->addChild('cart', $cart);
        $layout->toHtml();
    }
}
?>