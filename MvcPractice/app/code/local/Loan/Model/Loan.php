<?php
class Loan_Model_Loan extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Loan_Model_Resource_Loan';
        $this->_collectionClass = 'Loan_Model_Resource_Collection_Loan';
    }
    public function __beforeSave()
    {

        //    $this->addData('price', $price);
        //$this->addData('row_total', $price * $this->getQty());
    }
    public function add($request)
    {
        print_r($request);
        $p = $request['loan_amount'];
        $r = $request['rate'];
        $n = $request['term'];
        $M = $p * ($r * pow((1 + $r), $p)) / (pow((1 + $r), $n) - 1);
        $data = Mage::getModel('loan/loan')
            ->setData([
                'user_name' => $request['user_name'],
                'loan_amount' => $request['loan_amount'],
                'monthy_amount' => $request['monthy_amount'],
                'term' => $request['term'],
                'result' => $M,
                'created_date' => date("Y/m/d"),
            ]);
        $this->save();
    }
    // public function getStatus()
    // {
    //     $mapping = [
    //         1 => "Enabled",
    //         0 => "Disabled"
    //     ];
    //     return isset($this->_data['status'])
    //         ? $mapping[$this->_data['status']]
    //         : '';
    // }
}
?>