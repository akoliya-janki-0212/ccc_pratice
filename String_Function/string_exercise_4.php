<?php
    
$name = "John";
//Pad the string with underscores (`_`) on the left side to make its total length 10 characters.
$lpadstr=str_pad($name,10,"_", STR_PAD_LEFT);
// Pad the string with asterisks (`*`) on the right side to make its total length 8 characters.
$rpadstr=str_pad($name,8,"*", STR_PAD_RIGHT);
// Print the resulting strings.
echo $lpadstr."<br><br>";
echo $rpadstr."<br>";

?>