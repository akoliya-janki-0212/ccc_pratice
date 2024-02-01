<?php
class BankAccount{
    public $account_number,$account_holder,$balance;
    public function __construct($account_number,$account_holder,$balance){
        $this->account_number=$account_number;
        $this->account_holder=$account_holder;
        $this->balance=$balance;
    }
    public function deposit($amount){
        $this->balance+=$amount;
    }
    public function withdrow($amount){
        if($this->balance>=$amount){
            $this->balance-=$amount;
        }
        else{
            echo "Insufficient balance....<br>";
        }
    }
    public function display_info(){
        echo "Account Number: {$this->account_number} , Account Holder : {$this->account_holder} , Balance : {$this->balance}<br>";
    }

}

$bank1=new BankAccount(101,'janki',5000);
$bank1->withdrow(1000);
$bank1->display_info();
$bank1->deposit(500);
$bank1->display_info();
$bank1->withdrow(6000);
$bank1->display_info();

?>