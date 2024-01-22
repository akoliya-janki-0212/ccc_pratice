<?php
//using recursion
/* function factorial($no){
    if($no==1 || $no==0){
        return 1;
    }
    return $no*factorial($no-1);
} */
function factorial($no){
    if($no==1 || $no==0){
        return 1;
    }
    $ans=1;
    for($i=1;$i<=$no;$i++){
        $ans*=$i;
    }
    return $ans;
}
echo 'factorial : '.factorial(5);
?>