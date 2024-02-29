<?php
class Customer_Controller_Account extends Core_Controller_Front_Action
{
    protected $_allowedActions = ["login", "register"];
    public function init()
    {
        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedActions) &&
            !Mage::getSingleton('core/session')->get('logged_in_customer_id')
        ) {
            $this->setRedirect('customer/account/login');
        }
    }
    public function registerAction()
    {
        $this->includeCss('register.css');
        $layout = $this->getLayout();
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
        if ($result) {
            echo "<script>alert('Register Successfully')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/customer/account/login' . "'</script>";
        } else {
            echo "<script>alert('problem in registration')</script>";
            echo "<script>location.href='" . Mage::getBaseUrl() . '/customer/account/register' . "'</script>";
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

                // echo "<script>alert('Register Successfully')</script>";
                $this->setRedirect("customer/account/dashboard");
            } else {
                $this->setRedirect("customer/account/login");
            }
        } else {
            $this->includeCss('login.css');
            $layout = $this->getLayout();
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
        $this->includeCss(('dashboard.css'));
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $dashboardForm = $layout->createBlock('customer/account_dashboard_form');
        $child->addChild('form', $dashboardForm);
        $layout->toHtml();
    }
}
?>