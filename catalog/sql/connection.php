<?php
$servername='localhost';
$username='root';
$passsword='';
$dbname='ccc_practice';

//create connection
$conn=mysqli_connect($servername,$username,$passsword,$dbname) or die("<h3 style='color: red;'>ERROR: Could not connect. "
. mysqli_connect_error() . "</h3>");

?>