<?php
class Loan_Controller_Loan extends Core_Controller_Front_Action
{
    protected $_allowedActions = ['login'];
    public function formAction()
    {

        $layout = $this->getLayout();
        $layout->removeChild('header')->removeChild('footer');
        $child = $layout->getChild('content');
        $loginForm = $layout->createBlock('loan/form');
        $child->addChild('form', $loginForm);
        $layout->toHtml();

    }
    public function viewAction()
    {

        $layout = $this->getLayout();
        $layout->removeChild('header')->removeChild('footer');
        $child = $layout->getChild('content');
        $loginForm = $layout->createBlock('loan/view');
        $child->addChild('form', $loginForm);
        $layout->toHtml();

    }
    public function resultAction()
    {
        $request = $this->getRequest()->getParams('loan');
        //$data = Mage::getModel('loan/loan')->add($request);
        $p = $request['loan_amount'];
        $r = $request['rate'];
        $n = $request['term'];
        $M = $p * ($r * pow((1 + $r), $p)) / (pow((1 + $r), $n) - 1);
        $Model = Mage::getModel('loan/loan')
            ->setData([
                'user_name' => $request['user_name'],
                'loan_amount' => $request['loan_amount'],
                'monthly_amount' => $request['monthy_amount'],
                'term' => $request['term'],
                'result' => $M,
                'created_at' => date("Y/m/d"),
            ]);
        $Model->save();

        // $layout = $this->getLayout();
        // $layout->removeChild('header')->removeChild('footer');
        // $child = $layout->getChild('content');
        // $loginForm = $layout->createBlock('loan/form');
        // $child->addChild('form', $loginForm);
        // $layout->toHtml();

    }
}
?>