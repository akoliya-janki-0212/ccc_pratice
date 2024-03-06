<?php
class Loan_Model_Rate extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Loan_Model_Resource_Rate';
        $this->_collectionClass = 'Loan_Model_Resource_Collection_Rate';
    }
    public function getBanks()
    {
        $bank = $this->getCollection();
        foreach ($bank->getData() as $_bank) {
            $banks[$_bank->getRate()] = $_bank->getBankCode();
        }
        return $banks;
    }

}
?>