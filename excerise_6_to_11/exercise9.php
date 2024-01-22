<?php
function fibonacci($no){
    $first_term=1;
    $second_term=2;
    echo $first_term.'  '.$second_term.'  ';
    for($i=3;$i<=$no;$i++)
    {
        $ans=$first_term+$second_term;
        echo $ans.'  ';
        $first_term=$second_term;
        $second_term=$ans;
    }
}
fibonacci(10);
?>