<?php
class Model_Product extends Model_Abstract{
    public function __construct(){
        
    }
    public function add($data){
        $sql=$this->getQueryBuider()->insert('ccc_product',$data);
        return $this->getQueryExecutor()->exec($sql);
    }
    public function upd($data,$where){
        $sql=$this->getQueryBuider()->update('ccc_product',$data,$where);
        return $this->getQueryExecutor()->exec($sql);
    }
    public function dlt($where){
        $sql=$this->getQueryBuider()->delete('ccc_product',$where);
        return $this->getQueryExecutor()->exec($sql);
    }
}

?>