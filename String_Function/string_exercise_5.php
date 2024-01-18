<?php
$quote = "In three words I can sum up everything I've learned about life: it goes on.";

//Count the total number of words in the quote.
echo "Total word in string ::" .str_word_count($quote)."<br><br>";
//Convert the entire quote to lowercase.
echo "Convert string in lowercase : ".strtolower($quote)."<br><br>";
//Capitalize the first letter of each word in the quote.
echo "Capitalize string ::".ucwords($quote)."<br><br>";



?>