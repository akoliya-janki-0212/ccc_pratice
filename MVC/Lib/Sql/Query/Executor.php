<?php
class Lib_Sql_Query_Executor extends Lib_Sql_Connection{
    public function exec($sql){
        try{
        return $this->connect()->query($sql);
        // var_dump($this->connect()->error);
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
}
?>