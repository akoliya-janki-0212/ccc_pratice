<?php
class Core_Model_Db_Adapter
{
    public $host = 'localhost';
    public $db = 'ccc_practice';
    public $user = 'root';
    public $password = '';
    public $connect = null;
    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        }
    }
    public function fetchAll($query)
    {
    }
    public function fetchPairs($query)
    {
    }
    public function fetchOne($query)
    {
    }
    public function fetchRow($query)
    {
    }
    public function insert($query)
    {
    }
    public function update($query)
    {
    }
    public function delete($query)
    {
    }
    public function query($query)
    {
    }

}

?>