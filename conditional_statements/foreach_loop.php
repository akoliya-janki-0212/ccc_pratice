<?php
$arr=array("apple","banana","chery","orange");
foreach( $arr as $item){
    echo " ".$item." ";
}
echo "<br><br>";
$stud_arr=array("stud_id"=>101,
                "stud_nm"=>"janki",
                "stud_city"=>"amreli");
foreach($stud_arr as $key=>$value)
{
    echo $key." : ".$value."<br>";
}



?>