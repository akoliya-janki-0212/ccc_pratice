<pre><?php
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
        $tmp_data=[];
        $where_con_arr=[];
       
        foreach($data as $column=>$value){
            $tmp_data[]="`$column` = '$value'";
            
        }
        foreach($where as $column=>$value){
            $where_con_arr[]="`$column` = '$value'";
        }

        $columns_str=implode(",",$tmp_data);
        $where_con_str=implode(" AND ",$where_con_arr);
        $query="UPDATE {$table_name} set {$columns_str} WHERE {$where_con_str}";
        return $query;
    }
    public function delete($table_name,$where){
        $where_con_arr=[];
        foreach($where as $field=>$value){
            $where_con_arr[]="`$field`='$value'";
        }
        $where_con_str=implode(" AND ",$where_con_arr);
        $query="DELETE FROM {$table_name} WHERE {$where_con_str}";
        return $query;
    }
    public function select($table_name,$data,$where=[])
    {
        if(is_array($data)){
            $data_str=implode(',',$data);
        }
        $data_str=$data;
        if(!empty($where)){
            $where_con_arr=[];
            foreach($where as $field=>$value){
                $where_con_arr[]="`$field`='$value'";
            }
            $where_con_str=implode(" AND ",$where_con_arr);
            $query="SELECT {$data_str} FROM {$table_name} WHERE {$where_con_str}";
            
        }
        else{
            $query="SELECT {$data_str} FROM {$table_name}";
        }
        ;
        return $query; 
    }
}
?>
