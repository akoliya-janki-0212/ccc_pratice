<?php
class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        if (isset($_POST['Submit'])) {

            $data = $this->getRequest()->getParams('banner');
            var_dump($data);
            $bannerData = Mage::getModel('banner/banner')
                ->setData($data);
            $result = $bannerData->save();
            if ($result) {
                echo "<script>alert('Banner Uploaded')</script>";
                $this->setRedirect("admin/banner/form");
            } else {
                echo "<script>alert('Error in banner upload')</script>";
                echo "<script>location.href='" . Mage::getBaseUrl() . '/customer/account/register' . "'</script>";
            }
        } else {
            $this->includeCss('bannerUpload.css');
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $bannerForm = $layout->createBlock('banner/admin_banner_form');
            $child->addChild('form', $bannerForm);
            $layout->toHtml();
            // $imageUrl = Mage::getMediaUrl('banner/banner1.jpg');
            // print_r($imageUrl);
        }

    }
    public function listAction()
    {

    }
}


?>