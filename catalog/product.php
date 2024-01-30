<?php
require 'sql/connection.php';
require 'sql/functions.php';



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
        <form action="insert_product.php" method="post">
        <div class="user-details">
          <div class="form-group">
            <label for="product_name" class="details">Product Name </label>
            <input type="textbox" class="form-control" id="product_name" name=product[product_name]  placeholder="Enter product name" require>
          </div>
          <div class="form-group ">
            <label for="SKU" class="details">SKU</label>
            <input type="textbox" class="form-control" id="sku" name=product[sku] placeholder="Enter sku" require>
          </div>
          <div class="form-group-1">
            <fieldset>
              <legend>Product type </legend>
                <input type="radio" id="simple" name="product[product_type]" value="Simple">
                <label for="simple" class="details">Simple</label>
              
                <input type="radio" id="bundle" name="product[product_type]" value="Bundle">
                <label for="bundle" class="details">Bundle</label>
               </fieldset>
          </div>    
          <div class="form-group">
            <label for="category" class="details">Category</label>
              <select id="category" name="product[category]" class="input-box" required>
              <?php
                $categories = ["Bar & Game Room", "Bedroom", "Decor", "Dining & Kitchen", "Lighting", "Living Room", "Mattresses", "Office", "Outdoor"];
                  foreach ($categories as $category) {
                    echo '<option value="' . $category . '" ' . (($row['category'] == $category) ? 'selected' : '') . '>' . $category . '</option>';
                  }
              ?>
              </select>
          </div>
          <div class="form-group">
            <label for="manufacturer_cost" class="details">Manufacturer Cost</label>
            <input type="textbox" class="form-control" id="manufacturer_cost" name="product[manufacturer_cost]" placeholder="Enter Manufacturer Cost">
          </div>
          <div class="form-group">
            <label for="shipping_cost" class="details">Shipping Cost</label>
            <input type="textbox" class="form-control" id="shipping_cost" name="product[shipping_cost]" placeholder="Enter Shipping Cost">
          </div>
          <div class="form-group">
            <label for="total_cost" class="details">Total Cost</label>
            <input type="textbox" class="form-control" id="total_cost" name="product[total_cost]" placeholder="Enter Total Cost">
          </div>
          <div class="form-group">
            <label for="price" class="details">Price</label>
            <input type="textbox" class="form-control" id="price" name="product[price]" placeholder="Enter price">
          </div>
          <div class="form-group">
            <label for="status" class="details">Status</label>
              <select id="status" name="product[status]" class="input-box" required>
              <?php
                $status = ["Enabled","Disabled"];
                  foreach ($status as $item) {
                    echo '<option value="' . $item . '" ' . (($row['item'] == $item) ? 'selected' : '') . '>' . $item . '</option>';
                  }
              ?>
              </select>
          </div>
          <div class="form-group">
            <label for="create_at" class="details">CreateAt</label>
            <input type="date" class="form-control" id="create_at" name="product[created_at]" >
          </div>
          <div class="form-group">
            <label for="update_at" class="details">updaetAt</label>
            <input type="date" class="form-control" id="update_at" name="product[updated_at]" >
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