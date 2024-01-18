<?php
$str="Hello, World! How are you doing?";

echo $str."<br><br>";
// length of string
echo "length of string is :".strlen($str)."<br><br>";
//convert into lowercase
echo "String in lowercase :  ".strtolower($str)."<br><br>";
//convert into uppercase
echo "String in uppercase :  ".strtoupper($str)."<br><br>";

//Replace "How are you doing?" with "Fine, thank you!".
echo "Replaced string : ".str_replace("How are you doing?","Fine, thank you!",$str)."<br><br>";

//Extract and print the first 10 characters of the string.
echo "Substring : ".substr($str,0,10)."<br><br>";

//Extract and print the substring starting from the 8th character to the end.

echo "Substring :".substr($str,8)."<br><br>";
?>