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
        return $this->connect;
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
        $row = [];
        $this->connect();
        $result = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($result)) {
            $row = $_row;
        }
        return $row;
    }
    public function insert($query)
    {
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            echo "<script>alert('Data Inserted Successfully')</script>";
            return mysqli_insert_id($this->connect());
        } else {
            echo "<script>alert('Error: In Inserting Data')</script>";
            return FALSE;
        }
    }
    public function update($query)
    {
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            echo "<script>alert('Data Updated Successfully')</script>";
            return True;
        } else {
            echo "<script>alert('Error: In Updating Data')</script>";
            return FALSE;
        }
    }
    public function delete($query)
    {
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            echo "<script>alert('Data Deleted Successfully')</script>";
            return True;
        } else {
            echo "<script>alert('Error: In Deleting Data')</script>";
            return FALSE;
        }
    }
    public function query($query)
    {
    }

}

?>