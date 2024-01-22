<?php
 function multiples3(){
    return 'Fizz';
 }
 function multiples5(){
    return 'Buzz';
 }
 function multiplesboth(){
    return 'FizzBuzz';
 }
 $n=100;
 for($i=1;$i<=$n;$i++)
 {
    if($i%3==0 && $i%5==0)
    {
        echo multiplesboth().'  <br>  ';
    }
    elseif($i%3==0){
        echo multiples3().'  <br>  ';
    }
    elseif($i%5==0)
    {
        echo multiples5().'  <br>  ';
    }
    else{
        echo $i.'  <br>  ';
    }
}
?>