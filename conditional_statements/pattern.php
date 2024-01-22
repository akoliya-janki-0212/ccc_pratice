<?php
// Pattern : 1.0

/* $start='*';
for($i=5;$i>=1;$i--)
{
    for($j=1;$j<=5;$j++)
    {
        if($i>=$j){
        echo $j. " ";
    }
    }
    echo '<br>';
} */

//pattern : 1.1

/* for($i=1;$i<=5;$i++)
{
    for($j=1;$j<=6-$i;$j++)
    {
        echo $j." ";
        
    }
    echo "<br>";
} */

//pattern : 1.2

/* for($i=5;$i>=1;$i--)
{
    for($j=1;$j<=5;$j++)
    {
        echo $j." ";
        if($j==$i){
            break;
        }
        
    }
    echo '<br>';
} */

//pattern : 2

/* for($i=1;$i<=5;$i++)
{
    for($j=1;$j<=5;$j++){
        if($i==$j){
            echo $j;
        }
        else{
            echo "-";
        }
    }
    echo '<br>';
}
 */
//pattern - 3.0
/* for($i=1;$i<=5;$i++)
{
    $k=1;   
    for($j=1;$j<=5;$j++)
    {

       if($j>=(6-$i))
       {
        echo $k;
        $k++;
       }
       else{
        echo '0';
       }
    }
    echo '<br>';
} */
//patern 3.1
/* 
for($i=1;$i<=5;$i++)
{
    for($j=1;$j<=(5-$i);$j++)
    {
        echo "0";
    }
    for($k=$j;$k<=5;$k++)
    {
        echo $i;
    }
    echo '<br>';
} */
//pattern 4

?>