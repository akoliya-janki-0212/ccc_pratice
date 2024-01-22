<?php
//If $a is 10% higher than $b then $b is how much lower than $a

$per=0.10;
$a= 10;
$b=$a / (1 + $per);
$sum = (($a-$b)/$a)*100;
echo 'b is lower then  '.number_format($sum,2).'% a<br>';
echo 'value of b : '.$b.'and a : '.$a;


?>