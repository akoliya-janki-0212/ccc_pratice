<?php

function insert($conn,$table_name,$data=[]){
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
        echo "<script>location.href='product_list.php'</script>";
    }
    else{
        echo "<div class='alert alert-danger' role='alert'>
        Error instering record".$conn->error."
      </div>";
    }
    $conn->close();
}
function update($conn,$table_name,$data=[],$where=[]){
    $columns=$where_con_arr=[];
    foreach($data as $field=>$value){
        $columns[]="`$field`='$value'";
    }
    foreach($where as $field=>$value){
        $where_con_arr[]="`$field`='$value'";
    }
    
    $columns_str=implode(',',$columns);
    $where_con_str=implode(" AND ",$where_con_arr);
    $query="UPDATE {$table_name} SET {$columns_str} WHERE {$where_con_str}";
    $result=$conn->query($query);
    if($result){
        echo "<script>alert('Record update  susseccfully');</script>";
        echo "<script>location.href='product_list.php'</script>";
    }
    else{
        echo "<div class='alert alert-danger' role='alert'>
        Error updating record".$conn->error."
      </div>";
    }
    $conn->close();
}
function delete($conn,$table_name,$where=[]){
    $where_con_arr=[];
    
    foreach($where as $field=>$value){
        $where_con_arr[]="`$field`='$value'";

    }
    $where_con_str=implode(" AND ",$where_con_arr);
    $query="DELETE FROM {$table_name} WHERE {$where_con_str}";
    $result=$conn->query($query);
    if($result){
        echo "<script>alert('Record deleted  susseccfully');</script>";
        echo "<script>location.href='product_list.php'</script>";
    }
    else{
        echo "<div class='alert alert-danger' role='alert'>
        Error deleteing record".$conn->error."
      </div>";
    }
    $conn->close();
}
function select($conn,$table_name,$where=[])
{
    if($where){
        $where_con_arr=[];
        foreach($where as $field=>$value){
            $where_con_arr[]="`$field`='$value'";
        }
        $where_con_str=implode(" AND ",$where_con_arr);
        $query="SELECT * FROM {$table_name} WHERE {$where_con_str}";
    }
    else{
        $query="SELECT * FROM {$table_name}";
    }
    
    $result=$conn->query($query);
    return $result;
    $conn->close();
}
?>