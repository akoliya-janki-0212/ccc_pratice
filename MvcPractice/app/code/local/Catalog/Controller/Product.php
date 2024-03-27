<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action
{
   
    public function viewAction()
    {
        $this->includeFrontendCss('frondend/productView.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $ViewProduct = $layout->createBlock('catalog/product');
        $child->addChild('form', $ViewProduct);
        $layout->getChild('head')->addJs('productView.js');
        $layout->toHtml();
    }
}

?>