<?php
class Employee{
    public $name,$position,$salary;
    public function __construct($name,$position,$salary) {
        $this->name = $name;
        $this->position=$position;
        $this->salary=$salary;
    }
    public function calculate_yearly_bouns(){
        return $this->salary * 0.1;
    }
}
$emp1=new Employee("janki","manager",5000);
echo "Yearly bonus: ".$emp1->calculate_yearly_bouns();
?>