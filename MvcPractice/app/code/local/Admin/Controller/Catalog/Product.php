<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $this->includeCss('product.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        echo "<pre>";
        $data = $this->getRequest()->getParams('catalog_product');
        $category = Mage::getModel('catalog/product')
            ->setData($data);
        $category->save();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('catalog/product')->load($id);
        $product->delete();
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->toHtml();

    }

}
?>