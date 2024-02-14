<?php
class View_Product_List{
    public $rowObj;
    public function __construct(){
        $obj=new Model_Abstract();
        $query=$obj->getQueryBuider()->select("ccc_product","*");
        $result=$obj->getQueryExecutor()->exec($query);
        $rows=$obj->getQueryExecutor()->FetchAssoc($result);
        $this->rowObj=new Model_Data_Collection();
        foreach ($rows as $row) {
           $this->rowObj->addData($row);
        }
        
    }
    public function createTable(){
        $table='<div class="box">
                 <div class="container">
                 <div class="sub-con">   
                     <div class="title">Product Information
                    </div>
                    <div><a href="index.php?action=add&product_id=0"><button type="submit" name="btn_add" class="ins">Add</button></a></div>
                </div>
                    <div class="content">';
                     $table.='<table border="2px">
                        <tr><th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product SKU</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>delete</th>
                        </tr>'; 
                        foreach($this->rowObj->getData() as $data){                        
                        $table.=
                        "<tr>
                            <td class='column'>".$data->getproduct_id()."</td>
                            <td class='column'>".$data->getproduct_name()."</td>
                            <td class='column'>".$data->getsku()."</td>
                            <td class='column'>".$data->getcategory()."</td>
                            <td><div class='btn'><a href='index.php?action=edit&product_id=".$data->getproduct_id()."'><button class='upd'>Edit</button></a></td></div>
                            <td><div class='btn'><a href='index.php?action=delete&product_id=".$data->getproduct_id()."'><button class='dlt'>Delete</button></a></td></div>
                        </tr>";
                        }
                     $table.='</table>';
                    $table.=' </div>
                </div>
                </div>';
        return $table;
    }
    public function toHtml(){
        $css='<link rel="stylesheet" href="../../View/CSS/style.css">';
        $form=$this->createTable();
        return $css.$form;
               
    }

}

?>