<?php
function bubble_sort($arr)
{
    $n=count($arr);
    for($i=0;$i<$n-1;$i++){
        for($j=0;$j<$n-$i-1;$j++)
        {
            if($arr[$j]<=$arr[$j+1]){
                $tmp=$arr[$j];
                $arr[$j]=$arr[$j+1];
                $arr[$j+1]=$tmp;
            }
        }
    }
    return $arr;
}
$arr = [64, 34, 25, 12, 22, 11, 90];
echo '** Before sorting **<br>';
foreach($arr as $item){
    echo $item.'  ,  ';
}
echo '<br>';
$sorted_arr=bubble_sort($arr);
echo '** After sorting**<br>';
foreach($sorted_arr as $item){
    echo $item.'  ,  ';
}

?>