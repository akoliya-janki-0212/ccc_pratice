<?php
class Model_Product extends Model_Abstract{
    public function __construct(){

    }
    public function save($data){
        $sql=$this->getQueryBuider()->insert('ccc_product',$data);
        return $this->getQueryExecutor()->exec($sql);
    }

}

?>