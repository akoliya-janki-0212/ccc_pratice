<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action
{
    public function newAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product')
            ->setTemplate('product/productForm.phtml');
        $child->addChild('form', $productForm);
        $layout->toHtml();

    }
    public function saveAction()
    {
        echo "<pre>";
        $data = $this->getRequest()->getParams('catalog_product');
        $product = Mage::getModel('catalog/product')
            ->setData($data);
        $product->save();
        print_r($product);
    }
}
?>