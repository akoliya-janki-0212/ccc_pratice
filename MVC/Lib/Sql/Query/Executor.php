<pre>
<?php
class Lib_Sql_Query_Executor extends Lib_Sql_Connection{
    public function exec($sql){
        $result=$this->connect()->query($sql);
        return $result;
        
    }
    public function fetchAssoc($result){
        $data=[];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $data[]=$row;
            }
        }
        return $data;
    }
    public  function fetchRow($result){
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return $row;

        }
    }
}
?>