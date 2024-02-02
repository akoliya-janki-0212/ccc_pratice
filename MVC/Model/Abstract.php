<?php
class Model_Abstract{
    public function getQueryBuider($table_name=''){
        return new Lib_Sql_Query_Builder($table_name);
    }
    public function getQueryExecutor(){
        return new Lib_Sql_Query_Executor();
    }
}
?>