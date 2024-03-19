<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $this->includeAdminCss();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $mainChild = $child->getChild('maincontent');
        $categoryForm = $layout->createBlock('catalog/admin_category_form');
        $mainChild->addChild('form', $categoryForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_category');
        $category = Mage::getModel('catalog/category')
            ->setData($data);
        $result = $category->save();
        $id = $data['category_id'];
        if ($id) {
            if ($result) {
                echo "<script>alert('Category Updated Successfully')</script>";
                $this->setRedirect("admin/catalog_category/list");
            } else {
                echo "<script>alert('Error In Category Updating')</script>";
                $this->setRedirect("admin/catalog_category/form");
            }
        } else {
            if ($result) {
                echo "<script>alert('Category Inserted Successfully')</script>";
                $this->setRedirect("admin/catalog_category/list");
            } else {
                echo "<script>alert('Error In Category Inserting')</script>";
                $this->setRedirect("admin/catalog_category/form");
            }
        }
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $category = Mage::getModel('catalog/category')->load($id);
        $result = $category->delete();
        if ($result) {
            echo "<script>alert('Category Deleted Successfully')</script>";
            $this->setRedirect("admin/catalog_category/list");
        } else {
            echo "<script>alert('Error In Category Deleting')</script>";
            $this->setRedirect("admin/catalog_category/list");
        }
    }
    public function listAction()
    {
        $this->includeAdminCss('list.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $mainChild = $child->getChild('maincontent');
        $categoryList = $layout->createBlock('catalog/admin_category_list');
        $mainChild->addChild('form', $categoryList);
        $layout->toHtml();
    }
}

?>