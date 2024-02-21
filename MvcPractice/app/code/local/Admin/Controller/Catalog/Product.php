<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $this->includeCss($layout, 'product.css');
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product')
            ->setTemplate('catalog/admin/productForm.phtml');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        echo "<pre>";
        $obj = Mage::getModel('core/request');
        $id = $obj->getQueryData('id');

        if ($id) {
            $data = ['name' => 'bhumi'];
        } else {
            $data = $this->getRequest()->getParams('catalog_product');
        }
        $product = Mage::getModel('catalog/product')
            ->setData($data);
        $product->save();


    }
    public function deleteAction()
    {
        $obj = Mage::getModel('core/request');
        $id = $obj->getQueryData('id');
        $product = Mage::getModel('catalog/product')
            ->setData(['product_id' => $id]);
        $product->delete();
    }
    public function includeCss($layout, $file = null)
    {
        $layout->getChild('head')->addCss('header.css');
        $layout->getChild('head')->addCss($file);
        $layout->getChild('head')->addCss('footer.css');
    }
}
?>