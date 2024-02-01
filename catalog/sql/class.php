<?php
require 'connection.php';
class QueryBuilder{
    private $table_name;
    private $data=[];
    private $where=[];
    public function __construct($table_name){
        $this->table_name=$table_name;
    }
    public function insert($data=[]){
        $columns=$values=[];
        $this->data=$data;
        foreach($this->data as $column=>$value){
            $columns[]="`$column`";
            $values[]="'$value'";
        }

        $column=implode(',',$columns);
        $value=implode(',',$values);
        $query="INSERT INTO {$this->table_name} ($column) VALUES ($value)";
        return $query;
    }
    public function update($data=[],$where=[]){
        $this->data=$data;
        $this->where=$where;
        $columns=$where_con_arr=[];
        foreach($this->data as $field=>$value){
            $columns[]="`$field`='$value'";
        }
        foreach($this->where as $field=>$value){
            $where_con_arr[]="`$field`='$value'";
        }
        
        $columns_str=implode(',',$columns);
        $where_con_str=implode(" AND ",$where_con_arr);
        $query="UPDATE {$this->table_name} SET {$columns_str} WHERE {$where_con_str}";
        return $query;
    }
    public function delete($where=[]){
        $where_con_arr=[];
        $this->where=$where;
        foreach($this->where as $field=>$value){
            $where_con_arr[]="`$field`='$value'";
        }
        $where_con_str=implode(" AND ",$where_con_arr);
        $query="DELETE FROM {$this->table_name} WHERE {$where_con_str}";
        return $query;
    }
    public function select($where=[])
    {
        $this->where=$where;
        if($this->where){
            $where_con_arr=[];
            foreach($where as $field=>$value){
                $where_con_arr[]="`$field`='$value'";
            }
            $where_con_str=implode(" AND ",$where_con_arr);
            $query="SELECT * FROM {$this->table_name} WHERE {$where_con_str}";
        }
        else{
            $query="SELECT * FROM {$this->table_name}";
        }
        return $query;
    }
}
class QueryExecutor{
    private $query;
    public function query_execute($conn,$query){
        $this->query=$query;
        $result=$conn->query($this->query);
        return $result;
        $conn->close();
    }
    public function fetch($result){
        $data=[];
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $data[]=$row;
            }
        }
        return $data;
    }
}
?>