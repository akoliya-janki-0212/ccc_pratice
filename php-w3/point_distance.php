<?php
class Point{
    private $x,$y;
    function __construct($x,$y){
        $this->x=$x;
        $this->y=$y;
    }
    public function calculatedistance(Point $other){
        return sqrt(pow($this->x-$other->x,2)+pow($this->y-$other->y,2));
    }

    function __get($property){
        if(property_exists($this,$property)){
            return $this->$property;
        }
        else{
        echo 'this is  not existing Propery '.$property;
        }
    }
}
$p1=new Point(10,20);
$p2=new Point(2,5);
echo $p1->x."<br>";
echo $p1->y."<br>";
echo $p1->calculatedistance($p2);
?>