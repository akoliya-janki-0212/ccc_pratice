<?php
class Admin_Controller_User extends Core_Controller_Admin_Action
{

    protected $_email = 'admin@gmail.com';
    protected $_password = 'admin123';

    public function loginAction()
    {
        if (isset ($_POST['Submit'])) {

            $data = $this->getRequest()->getParams('login');

            $email = $data['admin_email'];

            $password = $data['password'];
            if ($this->_email == $email && $this->_password == $password) {
                Mage::getSingleton('core/session')->set('logged_in_admin_id', 1);
                echo "<script>alert('Login Success')</script>";
                $this->setRedirect("admin/user/dashboard");
            } else {
                echo "<script>alert('Invalid User Name Password')</script>";
                $this->setRedirect("admin/user/login");
            }
        } else {
            $this->includeAdminCss('login.css');
            $layout = $this->getLayout();
            $layout->removeChild('content')->removeChild('left');
            $loginForm = $layout->createBlock('admin/login');
            $layout->addChild('form', $loginForm);

            $layout->toHtml();
        }
    }
    public function dashboardAction()
    {
        $layout = $this->getLayout();
        $this->includeAdminCss();
        $child = $layout->getChild('content');
        $mainChild = $child->getChild('maincontent');
        $homeIndex = $layout->createBlock('page/admin_home');
        $mainChild->addChild('homeIndex', $homeIndex);
        $layout->toHtml();
    }
}
?>