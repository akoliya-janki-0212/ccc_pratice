<?php
class Loan_Controller_Loan extends Core_Controller_Front_Action
{
  
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
        print_r($request);
        Mage::getSingleton("core/session")->set("user_name", $request['user_name']);
        $result = Mage::getSingleton('loan/loan')->add($request);
        // if ($result) {
        //     echo "<script>alert('data added')</script>";
        //     $this->setRedirect("loan/loan/view");
        // }
        // $p = $request['loan_amount'];
        // $r = $request['rate'];
        // $n = $request['term'];
        // $M = $p * ($r * pow((1 + $r), $p)) / (pow((1 + $r), $n) - 1);
        // $Model = Mage::getModel('loan/loan')
        //     ->setData([
        //         'user_name' => $request['user_name'],
        //         'loan_amount' => $request['loan_amount'],
        //         'monthly_amount' => $request['monthly_amount'],
        //         'term' => $request['term'],
        //         'result' => $M,
        //         'created_at' => date("Y/m/d"),
        //     ]);
        // $Model->save();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $product = Mage::getModel('loan/loan')->load($id);
        $result = $product->delete();
    }
}
?>