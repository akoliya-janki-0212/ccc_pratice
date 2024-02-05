<pre>
<?php
class Model_Data_Collection extends Model_Data_Object{
    protected $_data = [];
    public  function __construct(){

    }
    public function addData($row){
            $this->_data[] = new Model_Data_Object($row);
    }

    public function getData() {
        return $this->_data;
    }
}
?>