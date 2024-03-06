<?php
class Loan_Model_Loan extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Loan_Model_Resource_Loan';
        $this->_collectionClass = 'Loan_Model_Resource_Collection_Loan';
    }
    public function getBankCode($rate)
    {
        $rateModel = Mage::getModel('loan/rate')->getCollection()->addFieldToFilter("rate", $rate);
        foreach ($rateModel->getData() as $rate) {
            $bankCode = $rate->getBankCode();
        }
        return $bankCode;
    }
    public function _beforeSave()
    {
        $session_id = Mage::getSingleton("core/session")->get("session_id");
        $request = $this->getData();
        $p = $request['loan_amount'];
        $r = $request['rate'];
        $n = $request['term'];
        $rm = $r / 12;
        $M = ($p * ($rm) * pow(($rm + 1), $n)) / (pow($rm + 1, $n + 1));
        //$M = $p * ($rm * pow((1 + $rm), $p)) / (pow((1 + $rm), $n) - 1);
        $this->addData('result', $M);
        $this->addData('created_at', date("Y/m/d"));
        $this->addData('session_id', $session_id);
        $this->addData('bank_code', $this->getBankCode($r));
        $this->removeData('rate');
    }
    public function add($request)
    {
        $data = Mage::getSingleton('loan/loan')
            ->setData($request);
        $this->save();
        return $this;


    }
}
?>