<?php
class Customer_Controller_Account extends Core_Controller_Front_Action
{


    public function registerAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('frontend/register.css');
        $this->removeChild();
        $child = $layout->getChild('content');
        $registerForm = $layout->createBlock('customer/account_register_form');
        $child->addChild('form', $registerForm);
        $layout->toHtml();
    }
    public function removeChild()
    {
        $layout = $this->getLayout();
        $layout->removeChild('header')
            ->removeChild('footer');
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('customer_account');
        $userAccount = Mage::getModel('customer/customer')
            ->setData($data);
        $result = $userAccount->save();
        print_r($result);
        if ($result) {
            echo "<script>alert('Register Successfully')</script>";
            $this->setRedirect("customer/account/login");
        } else {
            echo "<script>alert('problem in registration')</script>";
            $this->setRedirect("customer/account/register");
        }
    }
    public function loginAction()
    {
        if (isset($_POST['Submit'])) {
            $data = $this->getRequest()->getParams('login');
            $email = $data['customer_email'];
            $password = $data['password'];
            $data = Mage::getModel('customer/customer')
                ->getCollection()
                ->addFieldToFilter('customer_email', $email)
                ->addFieldToFilter('password', $password);
            echo '<pre>';
            $count = 0;
            $customerId = 0;
            foreach ($data->getData() as $data) {
                $count++;
                $customerId = $data->getCustomerId();
            }
            if ($count) {
                Mage::getSingleton('core/session')->set('logged_in_customer_id', $customerId);
                Mage::getSingleton('sales/quote')->initQuote();
                echo "<script>alert('Login Successfully')</script>";
                $this->setRedirect("customer/account/dashboard");
            } else {
                echo "<script>alert('error in login')</script>";
                $this->setRedirect("customer/account/login");
            }
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('frontend/login.css');
            $this->removeChild();
            $child = $layout->getChild('content');
            $loginForm = $layout->createBlock('customer/account_login_form');
            $child->addChild('form', $loginForm);
            $layout->toHtml();
        }
    }
    public function forgorPasswordAction()
    {

    }
    public function dashboardAction()
    {
        $this->includeFrontendCss(('dashboard.css'));
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $dashboardForm = $layout->createBlock('customer/account_dashboard_form');
        $child->addChild('form', $dashboardForm);
        $layout->toHtml();
    }
    public function profileAction()
    {
        $this->includeFrontendCss('dashboard.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $dashboardForm = $layout->createBlock('customer/account_profile');
        $child->addChild('form', $dashboardForm);
        $layout->toHtml();
    }
    public function logoutAction()
    {
        Mage::getSingleton('core/session')
            ->remove('logged_in_customer_id')
            ->remove('quote_id');
        $this->setRedirect('');
    }
}

?>