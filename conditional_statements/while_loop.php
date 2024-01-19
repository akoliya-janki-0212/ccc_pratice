<?php
$r=5;
$i=1;
echo "</h3>While loop<h3>";
while($i<=$r)
{
    $j=1;
    while($j<=$i){
        echo "* ";
        $j++;
    }
    $i++;
    echo "<br>";
}
echo "<h3>do while loop</h3>";
$i=5;
do{
    echo "hello good morning";
}while($i==1);
?>
