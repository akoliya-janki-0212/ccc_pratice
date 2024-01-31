<?php
require 'sql/connection.php';
require 'sql/functions.php';

/* $query="SELECT * FROM ccc_product ORDER BY product_id DESC LIMIT 20";
$result=$conn->query($query); */

$result=select($conn,'ccc_product');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <style>
        table {
            border-collapse: collapse;
        }

        th {
            font-size: 20px;
            font-weight: 500;
            position: relative;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .column {
            border: 1px solid black;
            border-collapse: collapse;
            padding-left: 15PX;
            align-items: center;
        }

        

        .dlt {
            margin: 5px;
            width: 80px;
            border-radius: 5px;
            border: none;
            color: white;
            background-color: red;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dlt:hover {
            transform: scale(0.99);
            background-color: #fa3c3caf;
        }

        .upd {
            margin: 5px;
            width: 90px;
            border-radius: 5px;
            border: none;
            color: white;
            background-color: #1e90ff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upd:hover {
            transform: scale(0.99);
            background-color: #00bfff;
        }
        .ins {
            margin: 5px;
            width: 90px;
            border-radius: 5px;
            border: none;
            color: white;
            background-color: #309d21;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .ins:hover {
            transform: scale(0.99);
            background-color: #7adf6c;
        }
        .btn {
            border: 1px solid black;
            border-collapse: collapse;
            align-items: center;
        }
        .title_details{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-right: 10%;

            }
    </style>
    </head>
    <body>
    <div class="box">
        <div class="container">
            <div class="title_details">
            <div class="title">Product Information</div>
            <div class='btn1'><a href='product.php?action=add&product_id=null'><button class='ins'>Add</button></a></div>
            </div>
            <div class="content">
            <?php
             if($result->num_rows>0){
            echo ("<table>
                        <tr><th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product SKU</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>delete</th></tr>    
                
                ");
                while ($row=$result->fetch_assoc()){
                    echo("<tr>
                    <td class='column'>".$row['product_id']."</td>
                    <td class='column'>".$row['product_name']."</td>
                    <td class='column'>".$row['sku']."</td>
                    <td class='column'>".$row['category']."</td>
                    <td class='btn'><a href='product.php?action=edit&product_id=".$row['product_id']."'><button class='upd'>Edit</button></a></td>
                    <td class='btn'><a href='product.php?action=delete&product_id=".$row['product_id']."'><button class='dlt'>Delete</button></a></td>
                    
                    </tr>");
                }
                echo "</table>";

             }
             else{
              echo "No record selected".$conn->error;  
                
             }?>
            </div>
        </div>
    </div>
    </body>
</html>