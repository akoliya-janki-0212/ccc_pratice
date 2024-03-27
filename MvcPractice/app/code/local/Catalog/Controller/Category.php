<?php
class Catalog_Controller_Category extends Core_Controller_Front_Action
{
    public function viewAction()
    {
        $this->includeFrontendCss('grid.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $ViewProduct = $layout->createBlock('catalog/grid');
        $child->addChild('form', $ViewProduct);
        $layout->toHtml();
    }
}

?>