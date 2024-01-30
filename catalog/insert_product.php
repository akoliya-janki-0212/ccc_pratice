<?php
require 'sql/connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
     $data=$_POST['product'];
    
    $columns=$values=[];
    foreach($data as $column=>$value){
        $columns[]="`$column`";
        $values[]="'$value'";
    }

    $column=implode(',',$columns);
    $value=implode(',',$values);
    $query="INSERT INTO ccc_product ($column) VALUES ($value)";
    $result=$conn->query($query);
    if($result){
        echo "<script>alert('data inserted successfully')</script>";
    }

    
}
?>