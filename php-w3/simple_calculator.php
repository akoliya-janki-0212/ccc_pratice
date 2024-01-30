<?php
class calculator{
    public $num1,$num2;
    function __construct($num1=0,$num2=0)//passing default agruments
    {
        
        $this->num1=$num1;
        $this->num2=$num2;
    } 
    function addition(){
        return $this->num1+$this->num2;
    }
    function substraction(){
        return $this->num1-$this->num2;
    }
    function multiplication(){
        return $this->num1*$this->num2;
    }
    function division(){
        if($this->num2!=0){
           return $this->num1/$this->num2;
        }
        else{
            echo "cannot divide by 0";
        }
    }
    function __destruct(){
        echo "this is destructor<br>";
    }
}
$obj1=new calculator(5,10);
echo "addition: ".$obj1->addition()."<br>";
echo "subtraction: ".$obj1->substraction()."<br>";
echo "multipliction: ".$obj1->multiplication()."<br>";
//echo "division: ".$obj1->division()."<br>";

$obj2=new calculator(5,10);
echo "addition: ".$obj2->addition()."<br>";
echo "subtraction: ".$obj2->substraction()."<br>";
echo "multipliction: ".$obj2->multiplication()."<br>";
echo "division: ".$obj2->division()."<br>";

$obj3=new calculator();
echo "addition: ".$obj3->addition()."<br>";

?>