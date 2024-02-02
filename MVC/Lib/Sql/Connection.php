<?php
class Lib_Sql_Connection{
    protected $conn=null;
    public function __construct(){
        $this->connect();
    }
    public function connect(){
        if(is_null($this->conn)){
            $servername='localhost';
            $username='root';
            $passsword='';
            $dbname='ccc_practice';

            //create connection
            $this->conn=mysqli_connect($servername,$username,$passsword,$dbname) or die("<h3 style='color: red;'>ERROR: Could not connect. "
            . mysqli_connect_error() . "</h3>");
        }
        return $this->conn;


    }
    

}
?>