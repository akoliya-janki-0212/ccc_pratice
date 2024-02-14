<pre>
<?php

$num=36;
$fact=array();
$j=0;
for($i=1;$i<=$num/2;$i++){
    if($num%$i==0){
        $fact[$j]=$i;
        $j++;
    }

}
print_r($fact);
//$arr=array(1,3,5,7,9);
// $tarr=$arr;
// sort($tarr);
// array_pop($tarr);
// echo "min:".array_sum($tarr).'<br>';
// print_r($tarr);
// $tarr=$arr;
// rsort($tarr);
// print_r($tarr);
// array_pop($tarr);
// echo "max:".array_sum($tarr);

// sort($arr);
// $tarr=$arr;
// array_splice($tarr,4,1);
// echo "min:".array_sum($tarr).'<br>';
// $tarr=$arr;
// print_r($tarr);
// array_splice($tarr,0,1);
// print_r($tarr);
// echo "max:".array_sum($tarr).'<br>';
?>