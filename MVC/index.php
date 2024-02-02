<?php
include 'Lib/autoload.php';
$request=new Model_Request();
if(!$request->isPost()){
    $product=new View_Product();
    echo $product->toHtml();
    
}
else{
    $product=new Model_Product();
    $result=$product->save($request->getParams('pdata'));
    if($result){
        echo "<script>alert('Data insert succefully')</script>";
    }
    else{
        echo "<script>alert('Data insert succefully')</script>";
    }

}
?>