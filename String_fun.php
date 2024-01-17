<?php

$str="hello good morning";
echo $str."<br />";

//string length - strlen()
// echo "length of given string is : ".strlen($str);
// echo strlen('')."<br>";
// echo strlen(' ')."<br>";
//echo strlen('ghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhtrlen is a PHP function that returns the length of a string in characters. It can also be used to return true if the string is empty or false if the string is not empty. The strlen function is useful for determining the length of a string before concatenating it with another string or performing length-based operations. It is a built-in function in PHP and can be used to manipulate the characters in a string.').'<br>';


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
//echo str_shuffle($str);

// convert string into array - strsplit()
// $arr=str_split($str);
// foreach ($arr as $item) {
//     echo $item,"<br>";
//}

//no of words  in string - str_word_count()
//echo str_word_count($str);

//replace text with in partion - substr_replace()
// echo substr_replace($str,"hi",6);
// echo substr_replace($str,"hi",6,4);

// padding in string str_pad() 
echo str_pad($str,22,"-");

//echo strrev($str);
?>
