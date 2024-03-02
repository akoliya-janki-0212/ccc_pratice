<?php
class Catalog_Controller_Category extends Core_Controller_Front_Action
{
    public function viewAction()
    {
        $this->includeCss('grid.css');
        $this->includeCss('banner.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $banner = $layout->createBlock('banner/banner');
        $child->addChild('banner', $banner);
        $ViewProduct = $layout->createBlock('catalog/grid');
        $child->addChild('form', $ViewProduct);
        $layout->toHtml();
    }
}

?>