<?php
class Student{
    public $name;
    public $age;
    public $grade;
    function __construct($name,$age,$grade){
        $this->name=$name;
        $this->age=$age;
        $this->grade=$grade;
    }
    private function display_info(){
        echo "Name: $this->name, Age: $this->age, Grade: $this->grade";
       // echo "Name : ".$this->name."<br>Age : ".$this->age."<br>grade : ".$this->grade;
    }
    public function __call($method,$args)//is call when user call private or not existing method 
    {
        echo 'this is private and not existing method   '.$method;
        /* if(method_exists($this,$method)){
            call_user_func_array([$this,$method],$args);
        }else{
         echo 'this is private and not existing method   '.$method;
        } */
    }


}
$obj1=new Student('janki',21,'A');
$obj1->display_info();
?>