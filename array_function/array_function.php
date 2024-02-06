<?php
echo "<h3> Array functions</h3>";

 //Array creation
// $arr=array(1,2,3);
// print_r($arr);
// echo "<br>";
// $arr=['one',1,'apple'];
// print_r(var_dump($arr));
// echo "<br>";

//Merage one or more array- array_merge()
// echo "<h4>array_merge() funcation:</h4>";
// $fruit_arr1=["appple","banana"];
// $fruit_arr2=array('orange','kiwi');
// print_r(array_merge($fruit_arr1,$fruit_arr2));
// echo '<br>';
// $arr1=array('color'=>'red','id'=>1,);
// $arr2=array('color'=>'green','id'=>2);
// print_r(array_merge($arr1,$arr2));
// echo "<br>";
// $array1 = array(0 => 'zero_a', 2 => 'two_a', 3 => 'three_a');
// $array2 = array(1 => 'one_b', 3 => 'three_b', 4 => 'four_b');
// $result = $array1 + $array2;
// print_r($result);

//combine two array- array_combine()
// echo "<h4> combine two array : array_combine() </h4>";
// $arr1=array(1,2,3,4,5,6);
// $arr2=array('one','two','three','four','five');
// print_r(array_combine($arr1,$arr2));
// echo '<br>';
//creating array contain range of element- range()
// echo "<h4>range() </h4>";
// $arr=range(10,3,2);
// print_r($arr);
// echo '<br>';
// $arr=range(1,6);
// print_r($arr);
 
 //Array modification


// $arr=array(1,2,3,4,5,6);
// push element end of array- array_push()
// print_r($arr);
// echo '<br>';
//push element end of array- array_push()
// echo "<h4> array_push():  </h4>";

// array_push($arr,7,8);// arry_push() is work slower then $arr[]
// print_r($arr);
// echo '<br>';
// $arr[]=9;
// print_r($arr);
// echo '<br>';
// $arr['c']='blue'; //push key value in array
// print_r($arr);


//pop element end of array- array_pop() time complexicy- o(n)
// echo "<h4> array_pop():  </h4>";
// echo array_pop($arr);
// echo '<br>';
// print_r($arr);
// echo '<br>';

//add element begining of array- array_unshift()
// echo "<h4> array_unshift():  </h4>";
// array_unshift($arr,10);
// print_r($arr);
// echo '<br>';

//add element begining of array- array_shift() time complexicy- o(n)
// echo "<h4> array_shift():  </h4>";
// $shift_item=array_shift($arr);
// echo $shift_item."<br>";
// print_r($arr);
// echo '<br>';


// $arr1=array_splice($arr,2,2,array('one','two'));
// print_r($arr1);
// echo '<br>';
// print_r($arr);
// echo '<br>'; 

/* // 3. Array access
$arr=array(1,2,3,4,5,6);
print_r($arr);
echo "<br>";
//count element in array - count()
echo "<h4> count():  </h4>";
echo "No of element : ".count($arr);
echo "<br>";
// alias of count - sizeof()
echo "<h4> sizeof():  </h4>";
echo "No of element :".count($arr);
echo '<br>';

//ckeck array key exist or not - array_key_exists() return bool
$arr1=array(
    'first_name'=>'janki',
    'middle_name'=>'sureshbhai',
    'last_name'=>'akoliya'
);
echo "<h4> array_key_exists():  </h4>";
echo array_key_exists('last_name', $arr1) ? 'key is exist' :'key is not exist';
echo '<br>';
//return all the key of an array - array_keys() return array
echo "<h4> array_keys():  </h4>";
print_r(array_keys($arr1));
echo '<br>';
//return all the value of an array - array_values() return array
echo "<h4> array_values():  </h4>";
print_r(array_values($arr1));
echo '<br>'; */

/* //4. array search
// check value exist in array - in_array()
echo "<h4> in_array():  </h4>";
$arr1=array("one","two","three");
echo in_array("2", $arr1) ?"exist..":"not exist..";
echo '<br>';
echo in_array("two", $arr1) ?"exist..":"not exist..";
echo '<br>';

$arr1=array(
    'first_name'=>'janki',
    'middle_name'=>'sureshbhai',
    'last_name'=>'akoliya'
);
//search value and return key -array_search()
echo "<h4> array_search():  </h4>";
echo array_search('akoliya',$arr1);
echo '<br>';
//reverse an array - array_reverse()
echo "<h4> array_reverse():  </h4>";
print_r(array_reverse($arr1));
echo '<br>';
print_r(array_reverse($arr1,true));
echo '<br>'; */

/* //5 . array sort

echo "<h1>Sorting function</h1>";
$arr=array(10,12,3,4,3,1,7);
//sort an array - sort()
echo "<h4>Sort()</h4><br>";
sort($arr);
print_r($arr);
echo "<br>";

//sort an array in reveerse order - rsort()
echo "<h4>rsort()</h4><br>";
rsort($arr);
print_r($arr);
echo "<br>";

$arr1=array(
    'first_name'=>'janki',
    'middle_name'=>'bsureshbhai',
    'last_name'=>'akoliya'
);

//sort an associative array by value - asort()
echo "<h4>asort()</h4><br>";
asort($arr1);
print_r($arr1);
echo "<br>";

//sort an associative array by key - ksort()
echo "<h4>ksort()</h4><br>";
ksort($arr1);
print_r($arr1);
echo "<br>";

//sort an associative array by value reverse order - arsort()
echo "<h4>arsort()</h4><br>";
arsort($arr1);
print_r($arr1);
echo "<br>";

//sort an associative array by key reverse order - krsort()
echo "<h4>krsort()</h4><br>";
krsort($arr1);
print_r($arr1);
echo "<br>"; */

//6 . array filter

// filter element of array using callback function - array_filter()
// echo "<h4>array_filter()</h4><br>";

// function odd($num){
//     return $num & 1;
// }
// function even ($num)
// {
//     return !($num & 1);
// }

// $arr1=array(1,2,34,3,7,5,2,);
// print_r(array_filter($arr1,"odd")).'<br>';
// print_r(array_filter($arr1,"even")).'<br>';

//map callback function with array - array_map()

// echo "<h4>array_map()</h4>";
// function squre($num)
// {
//     return $num*$num;
// }
// print_r(array_map("squre", $arr1))."<br>";

//Iteratively reduce the array to a single value using a callback function - array_reduce()

// echo "<h4>array_reduce()</h4>";
// function add($sum,$arr)
// {
//     $sum+=$arr;
//     return $sum;
// }
// print_r(array_reduce($arr1,"add",));
// echo "<br>";

//array_slice()

// echo "<h4>array_slice()</h4>";
// $arr=array(1,2,0,3,7,5,9,4,7);
// print_r($arr);
// echo '<br>';
// print_r(array_slice($arr,2,5));
// print_r(array_splice($arr,2,5,[4,8,9]));
// $arr1=array_splice($arr,2,5,[4,8,9]);
// print_r($arr1);
// print_r($arr);
// echo '<br>';

//remove portion of array and replace with something else - array_splice(array,offset,length,replacement)
// echo "<h4> array_splice():  </h4>";
// $arr1=array_splice($arr,2,5);
// print_r($arr1);
// echo '<br>';
// print_r($arr);
// echo '<br>'; 

?>