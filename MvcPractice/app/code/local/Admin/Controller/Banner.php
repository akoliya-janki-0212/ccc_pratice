<?php
class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        if (isset ($_POST['Submit'])) {

            $data = $this->getRequest()->getParams('banner');
            $bannerData = Mage::getModel('banner/banner')
                ->setData($data);
            $result = $bannerData->save();
            $id = $data['banner_id'];
            if ($id) {
                if ($result) {
                    echo "<script>alert('Banner Updated ')</script>";
                    $this->setRedirect("admin/banner/list");
                } else {
                    echo "<script>alert('Error in banner upload')</script>";
                    $this->setRedirect("admin/banner/form");
                }
            } else {
                if ($result) {
                    echo "<script>alert('Banner Uploaded')</script>";
                    $this->setRedirect("admin/banner/list");
                } else {
                    echo "<script>alert('Error in banner upload')</script>";
                    $this->setRedirect("admin/banner/form");
                }
            }
        } else {
            $this->includeAdminCss('bannerUpload.css');
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $mainChild = $child->getChild('maincontent');
            $bannerForm = $layout->createBlock('banner/admin_banner_form');
            $mainChild->addChild('form', $bannerForm);

            $layout->toHtml();

        }

    }
    public function listAction()
    {
        $this->includeAdminCss('bannerList.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $mainChild = $child->getChild('maincontent');
        $bannerForm = $layout->createBlock('banner/admin_banner_list');
        $mainChild->addChild('form', $bannerForm);
        // print_r($layout);
        $layout->toHtml();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('banner/banner')->load($id);
        $result = $product->delete();
        if ($result) {
            echo "<script>alert('Banner Deleted Successfully')</script>";
            $this->setRedirect("admin/banner/list");
        } else {
            echo "<script>alert('Error In Banner Deleting')</script>";
            $this->setRedirect("admin/banner/list");
        }
    }
}
?>