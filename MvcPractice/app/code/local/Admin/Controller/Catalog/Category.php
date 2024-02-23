<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $this->includeCss('category.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $categoryForm = $layout->createBlock('catalog/admin_category_form');
        $child->addChild('form', $categoryForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        echo "<pre>";
        $data = $this->getRequest()->getParams('catalog_category');
        $category = Mage::getModel('catalog/category')
            ->setData($data);
        $category->save();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('catalog/category')->load($id);
        $product->delete();

    }
}

?>