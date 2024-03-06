<?php
class Loan_Model_Rate extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Loan_Model_Resource_Rate';
        $this->_collectionClass = 'Loan_Model_Resource_Collection_Rate';
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