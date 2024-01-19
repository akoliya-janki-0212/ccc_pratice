<?php
// echo "Pattern using for loop<br>";
// $r=5;
// for($i=1;$i<=$r;$i++)
// {
//     for($j=1;$j<=$i; $j++)
//     {
//         echo $j." ";
//     }
//     echo "<br>";
// }

for($i=5;$i>=1;$i--)
{
    for($j=1;$j<=5;$j++)
    {
        if($j<=$i)
        {
        echo $j." ";
    }
    }
    echo "<br>";
}
for($i=1;$i<=5;$i++)
{
    for($j=1;$j<=5;$j++)
    {
        echo $j." ";
        if($j==$i)
        {
            break;
         }
    }
    echo "<br>";
}
?>