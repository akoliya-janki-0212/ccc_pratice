<?php
class Admin_Controller_User extends Core_Controller_Admin_Action
{
    protected $_allowedActions = ['login'];
    protected $_email = 'admin@gmail.com';
    protected $_password = 'admin123';
    public function loginAction()
    {
        if (isset($_POST['Submit'])) {
            echo 1;
            $data = $this->getRequest()->getParams('login');
            echo 2;
            $email = $data['admin_email'];
            echo 3;
            $password = $data['password'];
            if ($this->_email == $email && $this->_password == $password) {
                Mage::getSingleton('core/session')->set('logged_in_admin_id', $email);
                echo "<script>alert('Login Success')</script>";
                $this->setRedirect("admin/catalog_product/form");
            } else {
                echo "<script>alert('Invalid User Name Password')</script>";
                $this->setRedirect("admin/user/login");
            }
        } else {
            $this->includeCss('login.css');
            $layout = $this->getLayout();
            $layout->removeChild('header')->removeChild('footer');
            $child = $layout->getChild('content');
            $loginForm = $layout->createBlock('admin/login');
            $child->addChild('form', $loginForm);
            $layout->toHtml();
        }
    }
}
?>