<?php

$str="hello good morning";
echo $str."<br />";

//string length - strlen()
//echo "length of given string is : ".strlen($str);

//replace string - str_replace(search,newstr,str)
//echo " new string is : ".str_replace("morning","evening",$str);

//find position - strpos()
// $find='o';
// echo strpos( $str, $find ) ?"'$find' find in string":"'$find' not find in string ";
// echo "<br>";
// echo "position of '$find' :".strpos($str,$find)."<br>";

//return part of string - substr()
//echo substr($str,2,6);

// convert to lowercase - strtolower()
// $upper_str= "HELLO";
// echo strtolower($upper_str);

// convert to uppercase - strtoupper()
// echo strtoupper($str);

//remove whitespace - trim()
// $tstr= "      HEY good morning     ";
// echo "orginal string".var_dump($tstr)."<br>";
// echo "after applying trim() function :".var_dump(trim($tstr))."<br>";

// joing array into string - implode()
// $arr=array(1,2,3,4,5);
// echo var_dump(implode(" , ",$arr));

// split string - explode()
// $arr= explode(" ", $str);
// foreach ($arr as $item) {
//     echo $item.",";
// }

//encode specia character in html string - htmlspecialchars()
// $str= "heello <b> janki</b>";
// echo $str."</br>";
// echo htmlspecialchars($str)."</br>";

//convert all applicable characters to html entities - htmlentities

// $str= "heello 'I am ' <b> janki</b>";
// echo $str."</br>";
//echo htmlentities($str);

//repeat string n number of time - str_repeat()
//echo str_repeat($str,4)."<br>";

//reverse string -strrev()
//echo strrev($str);

//randomly shuffle all character in string - str_shuffle()
echo str_shuffle($str);
?>