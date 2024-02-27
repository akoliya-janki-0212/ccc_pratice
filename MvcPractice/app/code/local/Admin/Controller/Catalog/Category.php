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
        $result = $category->save();
        $id = $data['category_id'];
        if ($id) {
            if ($result) {
                echo "<script>alert('Data Updated Successfully')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
            } else {
                echo "<script>alert('Error In Data Updating')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
            }
        } else {
            if ($result) {
                echo "<script>alert('Data Inserted Successfully')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
            } else {
                echo "<script>alert('Error In Data Inserting')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
            }
        }
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $category = Mage::getModel('catalog/category')->load($id);
        $result = $category->delete();
        if ($result) {
            echo "<script>alert('Data Deleted Successfully')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
        } else {
            echo "<script>alert('Error In Data Deleting')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/admin/catalog_category/list' . "'</script>";
        }
    }
    public function listAction()
    {
        $this->includeCss('list.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $categoryList = $layout->createBlock('catalog/admin_category_list');
        $child->addChild('form', $categoryList);
        $layout->toHtml();
    }
}

?>