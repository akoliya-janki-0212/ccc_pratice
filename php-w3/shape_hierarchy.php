<?php

class Shape{

}
class Circle extends Shape{
    public $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function calculate_area()
    {
        return pi()*pow($this->radius,2);
    }
    public function calculate_perimeter(){
        return 2 * pi() * $this->radius;
    }
}
class Rectangle extends Shape{
    public $length;
    public $width;
    public function __construct($length,$width) {
        $this->length = $length;
        $this->width=$width;
    }
    public function calculate_area()
    {
        return $this->length * $this->width;
    }
    public function calculate_perimeter(){
        return 2 * ($this->length + $this->width);
    }
}
$circle=new Circle(10);
$rectangle=new Rectangle(2,5);

echo "Area of circle :".$circle->calculate_area()."<br>";
echo "Area of rectangle :".$rectangle->calculate_area();
?>