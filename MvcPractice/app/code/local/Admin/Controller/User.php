<?php
class Admin_Controller_User extends Core_Controller_Admin_Action
{
    protected $_allowedActions = ['login'];
    protected $email = 'admin@gmail.com';
    protected $password = 'admin123';
    public function loginAction()
    {
        /*  if (isset($_POST['Submit'])) {
             $data = $this->getRequest()->getParams('login');
             $email = $data['customer_email'];
             $password = $data['password'];
             if ($this->email == $email && $this->password == $password) {
                 Mage::getSingleton('core/session')->set('logged_in_Admin_id', $email);
                 $this->setRedirect("admin/catalog_product/form");
             } else {
                 $this->setRedirect("customer/account/login");
             }
         } else { */
        $this->includeCss('login.css');
        $layout = $this->getLayout();
        $layout->removeChild('header')->removeChild('footer');
        $child = $layout->getChild('content');
        $loginForm = $layout->createBlock('customer/account_login_form');
        $child->addChild('form', $loginForm);
        $layout->toHtml();
        /*  } */
    }
}
?>