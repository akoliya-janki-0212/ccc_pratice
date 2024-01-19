<?php 
 //arithmetic
//  $a=10;$b=20;
//  echo $a+$b;
//  echo $b-$a;
//  echo $a*2;
//  echo $a/2;
//  echo 13%2;
//  echo 2**3;

//assingment
// $a=10;
// $b=$a;
// echo $b;
// $b+=5;
// echo $b;
// $b-=5;
// echo $b;
// $b*=5;
// echo $b;
// $b/=5;
// echo $b;
// $b%=3;
// echo $b;

//comparision function

$a=10;
$b="10";

//Equal
echo "<b>Equal operator == </b><br>";
if($a==$b){
    echo "both are same<br>";
}
else{
     echo "both are not  same<br>";
}

// Identical
echo "<b>Identical operator === </b><br>";
if($a===$b){
    echo "both are same<br>";
}
else{
    echo "both are not  same<br>";
}

// Not equal
echo "<b>not Equal operator !=,<>,!== </b><br>";
$b=5;
if($a!=$b)
{
    echo "both are not  same<br>";
}
if($a<>$b)
{
    echo "both are not  same<br>";
}
$a="5";
if($a!==$b)
{
    echo "both are not  same<br>";
}

// grater then
echo "<b>grater then operator > </b><br>";
$per=82;
if($per>80){
    echo "Percentage is grather then 80<br>";
}
//lessthen
$per=79;
echo "<b>less then operator < </b><br>";
if($per<80){
    echo "Percentage is grather then 80<br>";
}

//grater then or equal
echo "<b>grater then or equal operator >= </b><br>";
$per=80;
if($per>=80){
    echo "Percentage is grather then or equal 80<br> ";
}
//lessthen or equal
echo "<b>lessthen or equal operator <= </b><br>";
if($per<=80){
    echo "Percentage is grather then or equal 80<br>";
}

echo "<h3>Logical operator</h3>";
//Logical And operator - &&
echo "<b>Logical and - && </b><br>";
$per=85;
if($per>=80 && $per<=100)
{
    echo "Brade A<br>";
}
else
{
    echo "fail..<br>";
}
//Logical or operator - ||
echo "<b>Logical or - || </b><br>";
$var="10";
if($var==10 || $var===10)
{
    echo "One of both condition is true<br>";
}
else
{
    echo "both condition is false<br>";
}
//logical not - !
echo "<b>logical not - !</b><br>";
$var=true;
if(!$var){
    echo "value of variable is false";
}
else{
    echo "value of variable is true";
}
//Increment decrement operator
echo "<h3>Increment operator</h3>";

//Increment 
echo "<bincrement operator</b></br>";
$var=10;
echo $var."<br>";
echo "Postfit increment".$var++."<br>";
echo $var."<br>";
echo "Prefit increment".++$var."<br>";
echo $var."<br>";

echo "<h3>Increment operator</h3>";

//decrement 
echo "<bdecrement operator</b></br>";
$var=10;
echo $var."<br>";
echo "Postfit decrement".$var--."<br>";
echo $var."<br>";
echo "Prefit decrement".--$var."<br>";
echo $var."<br>";

//concatination operator
echo "<h3>concatination operator</h3>";
$str1="hello";
$str2="world";

$str3=''.$str1.$str2;
echo $str3."<br>";
$str2.=$str1."<br>";

//ternary operator
echo "<h3>ternary operator</h3>";
$var=11;
echo $var>10?"$var grather then 10":"$var less then 10";

?>