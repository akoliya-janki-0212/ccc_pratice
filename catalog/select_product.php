<?php
require 'sql/connection.php';
$query="SELECT * FROM ccc_product ORDER BY product_id DESC LIMIT 20";
$result=$conn->query($query);


?>