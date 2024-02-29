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
        // $result = Mage::getModel('catalog/category')
        //     ->getCollection()
        //     ->addFieldToFilter('category_name', $data['category_id']);
        // $categoryId = 0;
        // foreach ($result->getData() as $result) {
        //     $categoryId = $result->getCategoryId();
        // }
        // if (!$categoryId == 0) {
        //     $data['category_id'] = $categoryId;
        // }
        $category = Mage::getModel('catalog/product')
            ->setData($data);
        $result = $category->save();
        $id = $data['product_id'];
        if ($id) {
            if ($result) {
                echo "<script>alert('Data Updated Successfully')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
            } else {
                echo "<script>alert('Error In Data Updating')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
            }
        } else {
            if ($result) {
                echo "<script>alert('Data Inserted Successfully')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
            } else {
                echo "<script>alert('Error In Data Inserting')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
            }
        }
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('catalog/product')->load($id);
        $result = $product->delete();
        if ($result) {
            echo "<script>alert('Data Deleted Successfully')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
        } else {
            echo "<script>alert('Error In Data Deleting')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_product/list' . "'</script>";
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