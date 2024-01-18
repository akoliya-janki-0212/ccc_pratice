<?php
$str="The quick brown fox jumps over the lazy dog";

//Find the position of the word "fox" in the sentence.
echo "Position of fox is :".strpos( $str,"fox")."<br><br>";
//Check if the word "cat" is present in the sentence.
echo stristr($str,"cat")?"cat is present":"cat is not  present"."<br><br>";
//Extract and print the first 20 characters of the sentence.
echo substr( $str,0,20)."<br><br>";
?>