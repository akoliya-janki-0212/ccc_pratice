<?php
echo "Pattern using for loop<br>";
$r=5;
for($i=1;$i<=$r;$i++)
{
    for($j=1;$j<=$i; $j++)
    {
        echo $j." ";
    }
    echo "<br>";
}

?>