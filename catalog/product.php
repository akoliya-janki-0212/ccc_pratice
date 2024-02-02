<?php
require 'sql/connection.php';
require 'sql/functions.php';
require 'sql/class.php';
$action =$_GET['action'];
//createing object of QueryBuilder and QueryExecutor class
$querybuild1=new QueryBuilder('ccc_product');
$queryexecute=new QueryExecutor();

if(isset($_GET['product_id']) && $action=='delete'){
  $product_id= $_GET['product_id'];
  //delete($conn,'ccc_product',['product_id'=>$product_id]);
  //delete using query builde and execute class
  $query=$querybuild1->delete(['product_id'=>$product_id]);
  $result=$queryexecute->query_execute($conn,$query);
  if($result){
    echo "<script>alert('data deleted successfully')</script>";
    echo "<script>location.href='product_list.php'</script>";
  }
  else{
      echo "<div class='alert alert-danger' role='alert'>
      Error deleted record".$conn->error."
    </div>";
  } 
}
if($action=='add'&&$_SERVER["REQUEST_METHOD"]=="POST"){
  $data = $_POST['product'];
  //insert using function
  //insert($conn,'css_product',$data);
  //insert using query builde and execute class
  $query=$querybuild1->insert($data);
  $result=$queryexecute->query_execute($conn,$query);
  if($result){
    echo "<script>alert('data inserted successfully')</script>";
    echo "<script>location.href='product_list.php'</script>";
  }
  else{
      echo "<div class='alert alert-danger' role='alert'>
      Error instering record".$conn->error."
    </div>";
  } 
}
if (isset($_GET['product_id']) && $action == "edit" && $_SERVER["REQUEST_METHOD"] == "POST") {
  $product_id=$_GET['product_id'];
  $data = $_POST['product'];
  if ($product_id == $data['product_id']) {
        //update($conn,'ccc_product',$data,['product_id'=>$product_id]);
        //update using class
        $query=$querybuild1->update($data,['product_id'=>$product_id]);
        $result=$queryexecute->query_execute($conn,$query);
        if($result){
          echo "<script>alert('data updated successfully')</script>";
          echo "<script>location.href='product_list.php'</script>";
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>
            Error updating record".$conn->error."
          </div>";
        } 
      }
        else{
          echo "<div class='alert alert-danger' role='alert'>
          Error :Unable to change product id
        </div>";
        
      }
    }

?>

<?php
      
 if(isset($_GET['product_id'])){
  $products=[];
  $product_id=$_GET['product_id'];
  //$result=select($conn,'ccc_product',['product_id'=>$product_id]);
  $query=$querybuild1->select(['product_id'=>$product_id]);
  $result=$queryexecute->query_execute($conn,$query);
  $products=set_value($result);
} 
function set_value($result)
{
       global $queryexecute;
      
        $rows=$queryexecute->fetch($result);
        foreach($rows as $row){
        $products['product_id']=isset($row['product_id'])?$row['product_id']:" ";
        $products['product_name']=isset($row['product_name'])?$row['product_name']:" ";
        $products['sku']=isset($row['sku'])?$row['sku']:" ";
        $products['product_type']=isset($row['product_type'])?$row['product_type']:" ";
        $products['category']=isset($row['category'])?$row['category']:" ";
        $products['manufacturer_cost']=isset($row['manufacturer_cost'])?$row['manufacturer_cost']:" ";
        $products['shipping_cost']=isset($row['shipping_cost'])?$row['shipping_cost']:" ";
        $products['total_cost']=isset($row['total_cost'])?$row['total_cost']:" ";
        $products['price']=isset($row['price'])?$row['price']:" ";
        $products['status']=isset($row['status'])?$row['status']:" ";
        $products['created_at']=isset($row['created_at'])?$row['created_at']:" ";
        $products['updated_at']=isset($row['updated_at'])?$row['updated_at']:" " ;
      }
       
  //echo $product_id." ".$product_name." ".$sku." ".$product_category." ".$manufecturer_cost." ".$shipping_cost." ".$total_cost." ".$price." ".$product_status." ".$created_at." ".$updated_at;
    return $products;
  }
 

   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
            .form_group {
                width: 500px;
                max-width: 100%;
            }

            form .form_group label.details {
                display: block;
                font-weight: 500;
                margin-bottom: -10px;
            }
        </style>
  </head>  
  <body>
  
    <div class="box">
      <div class="container">
        <div class="title">Product Information</div>
      <div class="content">
        <form action="#" method="post">
        <div class="user-details">
        <?php
        if($action=='edit'){
          echo '<div class="form-group">
          <label for="product_id" class="details">Product ID </label>
          <input type="textbox" class="form-control" id="product_id" name=product[product_id] require
           value='. $products['product_id'].'>
        </div>';
        }
        
          ?>
          <div class="form-group">
            <label for="product_name" class="details">Product Name </label>
            <input type="textbox" class="form-control" id="product_name" name=product[product_name] value="<?php echo $products['product_name'];?>"  placeholder="Enter product name" require>
          </div>
          <div class="form-group ">
            <label for="SKU" class="details">SKU</label>
            <input type="textbox" class="form-control" id="sku" name=product[sku] value="<?php echo $products['sku'];?>" placeholder="Enter sku" require>
          </div>
          <div class="form-group-1">
                <legend>Product type </legend>
                <?php if ($products['product_type'] == "Simple") : ?>
                <input type="radio" id="simple" name="product[product_type]" value="Simple" checked>
                <label for="simple" class="details">Simple</label>
                <input type="radio" id="bundle" name="product[product_type]" value="Bundle">
                <label for="bundle" class="details">Bundle</label>
                <?php elseif($products['product_type']=='Bundle'): ?>
                <input type="radio" id="simple" name="product[product_type]" value="Simple" >
                <label for="simple" class="details">Simple</label>
                <input type="radio" id="bundle" name="product[product_type]" value="Bundle" checked>
                <label for="bundle" class="details">Bundle</label>
                <?php else:?>
                <input type="radio" id="simple" name="product[product_type]" value="Simple" >
                <label for="simple" class="details">Simple</label>
                <input type="radio" id="bundle" name="product[product_type]" value="Bundle">
                <label for="bundle" class="details">Bundle</label>
               
                <?php endif; ?>

          </div>    
          <div class="form-group">
            <label for="category" class="details">Category</label>
              <select id="category" name="product[category]" value="<?php echo $products['category'];?>" class="input-box" required>
              <?php
                $categories = ["-- select --","Bar & Game Room", "Bedroom", "Decor", "Dining & Kitchen", "Lighting", "Living Room", "Mattresses", "Office", "Outdoor"];
                  foreach ($categories as $category) {
                    echo '<option value="' . $category . '" ' . (($products['category'] == $category) ? 'selected' : '') . '>' . $category . '</option>';
                  }
              ?>
              </select>
          </div>
          <div class="form-group">
            <label for="manufacturer_cost" class="details">Manufacturer Cost</label>
            <input type="textbox" class="form-control" id="manufacturer_cost" name="product[manufacturer_cost]" value="<?php echo $products['manufacturer_cost'];?>" placeholder="Enter Manufacturer Cost">
          </div>
          <div class="form-group">
            <label for="shipping_cost" class="details">Shipping Cost</label>
            <input type="textbox" class="form-control" id="shipping_cost" name="product[shipping_cost]" value="<?php echo $products['shipping_cost'];?>" placeholder="Enter Shipping Cost">
          </div>
          <div class="form-group">
            <label for="total_cost" class="details">Total Cost</label>
            <input type="textbox" class="form-control" id="total_cost" name="product[total_cost]" value="<?php echo $products['total_cost'];?>" placeholder="Enter Total Cost">
          </div>
          <div class="form-group">
            <label for="price" class="details">Price</label>
            <input type="textbox" class="form-control" id="price" name="product[price]" value="<?php echo $products['price'];?>" placeholder="Enter price">
          </div>
          <div class="form-group">
            <label for="status" class="details">Status</label>
              <select id="status" name="product[status]" value="<?php echo $products['status'];?>" class="input-box" required>
              <?php
                $status = ["-- select --","Enabled","Disabled"];
                  foreach ($status as $item) {
                    echo '<option value="' . $item . '" ' . (($products['status'] == $item) ? 'selected' : '') . '>' . $item . '</option>';
                  }
              ?>
              </select>
          </div>
          <div class="form-group">
            <label for="create_at" class="details">CreateAt</label>
            <input type="date" class="form-control" id="create_at" value="<?php echo $products['created_at'];?>" name="product[created_at]" >
          </div>
          <div class="form-group">
            <label for="update_at" class="details">updaetAt</label>
            <input type="date" class="form-control" id="update_at"  value="<?php echo $products['updated_at'];?>" name="product[updated_at]" >
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Submit">
        </div>
        </form>
     </div>
    </div>
    </body>
</html>