<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{
    protected $_allowedActions = ['form'];
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
        $data = $this->getRequest()->getParams('catalog_product');
        $category = Mage::getModel('catalog/product')
            ->setData($data);
        $result = $category->save();
        $id = $data['product_id'];
        if ($id) {
            if ($result) {
                echo "<script>alert('Product Updated Successfully')</script>";
                $this->setRedirect("admin/catalog_product/list");
            } else {
                echo "<script>alert('Error In Product Updating')</script>";
                $this->setRedirect("admin/catalog_product/form");
            }
        } else {
            if ($result) {
                echo "<script>alert('Product Inserted Successfully')</script>";
                $this->setRedirect("admin/catalog_product/list");
            } else {
                echo "<script>alert('Error In Product Inserting')</script>";
                $this->setRedirect("admin/catalog_product/form");
            }
        }
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('catalog/product')->load($id);
        $result = $product->delete();
        if ($result) {
            echo "<script>alert('Product Deleted Successfully')</script>";
            $this->setRedirect("admin/catalog_product/list");
        } else {
            echo "<script>alert('Error In Product Deleting')</script>";
            $this->setRedirect("admin/catalog_product/list");
        }
    }
    public function listAction()
    {
        $this->includeCss('list.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->toHtml();
    }
}
?>