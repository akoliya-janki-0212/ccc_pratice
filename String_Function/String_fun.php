<?php

$str="hello good morning";
echo $str."<br />";

// *******************************************************
//string length - strlen(str) return byte
// echo "length of given string is : ".strlen($str);
// echo strlen('')."<br>";
// echo strlen(' ')."<br>";
//echo strlen('ghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhtrlen is a PHP function that returns the length of a string in characters. It can also be used to return true if the string is empty or false if the string is not empty. The strlen function is useful for determining the length of a string before concatenating it with another string or performing length-based operations. It is a built-in function in PHP and can be used to manipulate the characters in a string.').'<br>';
//echo strlen(null)."</br>";

// *******************************************************
//replace string - str_replace(search,replace,str,count) return array
//echo " new string is : ".str_replace("morning","evening",$str)."<br>";
// var_dump(str_replace("morning","evening",$str));
// $arr = array("o","x");
// echo str_replace($arr, "e", "Hello World of PHP")."<br>";
// echo str_replace('good','a',$str);
/* $search_arr=array('hello','good','morning');
$replace_arr=array('hi','evening');
echo str_replace($search_arr, $replace_arr, $str);
 */
// $search_arr=array('hello','good');
// $replace_arr=array('hi','bad','evening');
// echo str_replace($search_arr, $replace_arr, $str)."<br>"; 
// echo str_replace("o", "A",$str, $count)."<br>";
// echo $count."<br>";
// $search_arr=array('hello','good','morning');
// $replace_arr="hi";
// echo str_replace($search_arr, $replace_arr, $str);
// $searcharr  = array('A', 'B', 'C', 'D', 'E');
// $replacearr = array('B', 'C', 'D', 'E', 'F');
// $str = 'A';
// echo str_replace($searcharr, $replacearr, $str)."<br>";

//*******************************************************
//find position - strpos(str,findstr,offset) return int/false
// $find='o';
// echo strpos( $str, $find ) ?"'$find' find in string":"'$find' not find in string ";
// echo "<br>";
// echo "position of '$find' :".strpos($str,$find)."<br>";
// echo strpos($str,"")?"find":"not find"."<br/>";
//echo strpos($str,'o',6);
// $str='abc';
// $find='a';
// echo strpos($find,$str)?"'$find' find in string":"'$find' not find in string ";
//$output=strpos($str,$find);
// if($output===FALSE){
//     echo 'not found';
// }
// else{
//     echo 'found';
// }

//*******************************************************
//return part of string - substr(str,offset,len) //retrun string
// echo substr($str,2,6);
// echo substr($str,3,null);
// echo substr($str,4,-2);
// echo substr($str,-4,-2);

//*******************************************************
// convert to lowercase - strtolower()
// $upper_str= "HELLO";
// echo strtolower($upper_str);

//*******************************************************
// convert to uppercase - strtoupper()
// echo strtoupper($str);

//*******************************************************
//remove whitespace - trim()
// $tstr= "      HEY good morning     ";
// echo "orginal string".var_dump($tstr)."<br>";
// echo "after applying trim() function :".var_dump(trim($tstr))."<br>";
// $trim_str="***** helo ******";
// echo $trim_str;
// echo trim($trim_str,'*');

//*******************************************************
// joing array into string - implode() retun string
// $arr=array(1,2,3,4,5);
// echo var_dump(implode(" , ",$arr));
// var_dump(implode('hello', []));
// var_dump(join(' ',$arr));
//*******************************************************
// split string into array - explode() return array
// $arr= explode(" ", $str);
// foreach ($arr as $item) {
//     echo $item.",";
// }
/* $str="one two three four";
echo var_dump(explode(' ',$str))."<br>";
echo var_dump(explode(' ',$str,2))."<br>";
echo var_dump(explode(' ',$str,-2))."<br>";*/ 

//*******************************************************
//encode special character in html string - htmlspecialchars()
// $str= "heello <b> janki</b>";
// echo $str."</br>";
// echo htmlspecialchars($str,ENT_XML1)."</br>";

//*******************************************************
//convert all applicable characters to html entities - htmlentities
// $str= "heello 'I am ' <b> janki</b>";
// echo $str."</br>";
//echo htmlentities($str);

//*******************************************************
//repeat string n number of time - str_repeat()
//echo str_repeat($str,4)."<br>";
// echo str_repeat($str,0)."<br>";

//*******************************************************
//reverse string -strrev()
//echo strrev($str);

//*******************************************************
//randomly shuffle all character in string - str_shuffle()
// echo str_shuffle($str);


//*******************************************************
// convert string into array - strsplit() return array
// $arr=str_split($str);
// foreach ($arr as $item) {
//     echo $item,"<br>";
//}
// print_r(str_split($str,4));

//*******************************************************
//no of words  in string - str_word_count()  return array/int
// echo str_word_count($str)."<br>";
// echo str_word_count($str,0);
// print_r(str_word_count($str,1));
// print_r(str_word_count($str,2));

//*******************************************************
//replace text with in partion - substr_replace(str,replace,offset,len)
// $str1="hey how are you?";
// $str2="hi";
// echo substr_replace($str1,$str2,0,-5);
// echo substr_replace($str1,$str2,0);
// echo substr_replace($str1,$str2,0,0);
// echo substr_replace($str1,$str2,2,2)."<br>";
// echo substr_replace($str1,$str2,-3,-2);

//*******************************************************
// padding in string str_pad() 
// $str= "janki";
// echo str_pad($str,7,"--");
// echo str_pad($str,-7,"-");
// echo str_pad($str,7,"-",STR_PAD_BOTH);

//*******************************************************
//compring string-strcoll(str1,str2)
// echo strcoll("hello",'hello');//0 same
// echo strcoll("hello",'Hello');//1 str1>str2
// echo strcoll("Hello",'hello');//-1 str1<str2

//*******************************************************
// echo strcspn($str,'e');
// $f = strcspn('abcdhelloabcd', 'abcd', -9, -5);
// echo $f;

//*******************************************************
//search string case sensitive-stristr() return string false
// echo stristr($str,"G");
// echo strstr($str,"G");


//*******************************************************
// reverse string - strrev()
//echo strrev($str);

//*******************************************************
//upercase of first character of sensents-ucfirst()
// echo ucfirst($str)."<br>";

//*******************************************************
//uppercase of first character of each word - ucwords()
// echo ucwords($str);
// $str= "aa|bb";
// echo ucwords($str,'|');
// $str = 'ABC';
// var_dump(str_increment($str));
?>
