<?php
class Lib_Sql_Query_Builder extends Lib_Sql_Connection{

    public function __construct(){
    }
    public function insert($table_name,$data)
    {
        
        $columns=$values=[];
        foreach ($data as $column => $value) {
            $columns[]=sprintf("`%s`",$column);
            $values[]=sprintf("'%s'",addslashes($value));
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        $query="INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
        return $query;
    }
    public function update($table_name,$data,$where){
        $data=[];
        $where_con_arr=[];
        foreach($data as $column=>$value){
            $data[]="`$column` = '$value'";
        }

        $columns=implode(",",$columns);
        $values=implode(",",$values);
        $query="UPDATE {$table_name} set ({$columns})=({$values}) WHERE";
    }
}
?>