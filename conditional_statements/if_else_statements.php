<?php
//If statement
echo "<h3> If Statement</h3>";
$time=12;
if($time<=12)
{
    echo " hello , good morning";
}

//IF else statement
echo "<h3> If else Statement</h3>";
$time=15;
if($time<=12)
{
    echo " hello , good morning";
}
else{
    echo "hello, good afternoon";
}

//IF else statement
echo "<h3> if-elseif-else Statement</h3>";
$time=13;
if($time>=6 && $time<= 12)
{
    echo " hello , good morning";
}
else if($time>12 && $time<= 18)
{
    echo "hello, good afternoon";
}
else if($time>18 && $time<= 21)
{
    echo "hello, good evening";
}
else{
    echo "hello, good night";
}

//nested if statement
echo "<h3>nested if statement</h3>";

$num1=10;
$num2=5;
$num3=66;
if($num1>$num2){
    if($num1>$num3)
    {
        echo"$num1 is grater then  $num3 and $num2<br>";
    }
    else{
        echo"$num3 is grater then or equal $num1 and $num2<br>";
    }
    
}
else{
    if($num2>$num3){
    echo"$num2 is grater then or equal $num1 and $num3<br>";
    }
    else{
        echo"$num3 is grater then or equal $num1 and $num2<br>";
    }
}
?>