<?php
class Product{
    private $product_id;
    private $product_name;
    private $price;
    public function __construct($product_id,$product_name,$price){
        $this->product_id=$product_id;
        $this->product_name=$product_name;
        $this->price=$price;
    }
    function __get($property){
        if(property_exists($this,$property)){
            return $this->$property;
        }
        else{
            echo 'Unable to access not existing propery {$property}';
        }
    }
}
class ShoppingCart{
    private $items=[];
    public function add_product(Product $product){
        $this->items []=$product;
    }
    public function calculate_price(){
        $total_amount=0;
        foreach($this->items as $item){
            $total_amount+=$item->price;
        }
        return $total_amount;
    }
    public function display_items(){
        echo " ** Shoping cart items **<br>";
        foreach($this->items as $item){
            echo "Product name : {$item->product_name} , price : {$item->price}</br>";
        }
    }

}
$product1= new Product(101,'laptop',300000);
$product2= new Product(102,'mobile',150000);

$cart=new ShoppingCart();
$cart->add_product($product1);
$cart->add_product($product2);

$cart->display_items();
echo "Total price : ".$cart->calculate_price();


?>