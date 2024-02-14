<?php
class View_Product{
    public $rowObj;
    public function __construct(){
        $obj=new Model_Request();
        $id=$obj->getQueryData('product_id');
        //echo '$id'.$id;
        $obj=new Model_Abstract();
        $query=$obj->getQueryBuider()->select("ccc_product","*",['product_id'=>$id]);
        $result=$obj->getQueryExecutor()->exec($query);

        $row=$obj->getQueryExecutor()->FetchRow($result);
        //print_r($row);
        $this->rowObj=new Model_Data_Object($row);
    }
    public function createForm(){
       // echo $this->rowObj->getproduct_id();
        $div='<div class="form-group">';
        $form='<div class="box">
                <div class="container">
                    <div class="title">Product Information</div>
                    <div class="content">';
                        $form.='<form action="" method="POST">';
                            $form.=$div;
                                $form.=$this->createLabel('Product name ');
                                $form.=$this->createTextField('pdata[product_name]','product_name',$this->rowObj->getproduct_name());
                            $form.='</div>';
                            $form.=$div;
                                $form.=$this->createLabel('sku ');
                                $form.=$this->createTextField('pdata[sku]','sku',$this->rowObj->getsku());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Produc Type ');
                                    $form.=$this->createRadioButton('pdata[product_type]','Simple',$this->rowObj->getproduct_type());
                                    $form.=$this->createRadioButton('pdata[product_type]','Bundle',$this->rowObj->getproduct_type());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Category ');
                                    $arr=["-- select --","Bar & Game Room", "Bedroom", "Decor", "Dining & Kitchen", "Lighting", "Living Room", "Mattresses", "Office", "Outdoor"];
                                    $form.=$this->createDropDown('pdata[category]',$arr,$this->rowObj->getcategory());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Manufacturer Cost');
                                    $form.=$this->createTextField('pdata[manufacturer_cost]','manufacturer_cost',$this->rowObj->getmanufacturer_cost());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Shipping Cost ');
                                    $form.=$this->createTextField('pdata[shipping_cost]','shipping_cost',$this->rowObj->getshipping_cost());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Total Cost '); 
                                    $form.=$this->createTextField('pdata[total_cost]','total_cost',$this->rowObj->gettotal_cost());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Price ');
                                    $form.=$this->createTextField('pdata[price]','price',$this->rowObj->getprice());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Status ');
                                    $arr=["-- select --","Enabled", "Disabled"];
                                    $form.=$this->createDropDown('pdata[status]',$arr,$this->rowObj->getstatus());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Created At ');
                                    $form.=$this->createDateField('pdata[created_at]','created_at',$this->rowObj->getcreated_at());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Updated At ');
                                    $form.=$this->createDateField('pdata[updated_at]','updated_at',$this->rowObj->getupdated_at());
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createSubmitButton('Submit');
                            $form.='</div>';
                        $form.='</form>';
                    $form.=' </div>
                </div>
            </div>';
        return $form;
    }
    public function createLabel($title,$id=''){
        return '<label for="'.$id.'">'.$title.'</label>';
    }
    public function createTextField($name,  $id = '',$value = '')
    {
        return '<input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
    }
    public function createSubmitButton($title){
        return '<input type="submit" value="'.$title.'" name="submit">';
    }
    public function createRadioButton($name,$label,$value,$id=''){
        return '<input type="radio" id="'.$id.'" name="'.$name.'" value="'.$label.'"'.(($value==$label)?'checked':'').'>'.$label.'';

    }
    public function createDropDown($name,$categories,$value='',$id=''){
        $drop_down='<select id="'.$id.'" name="'.$name.'" value="'.$value.'">';
            foreach ($categories as $category) {
            $drop_down.='<option value="'. $category .'"'. (($value == $category) ? 'selected' : '') .'>' . $category . '</option>';
        }
        $drop_down.='</select>';
        return $drop_down;
    }
    public function  createDateField($name='',$id='',$value=''){
        return '<input type="date"  id="'.$id.'" value="'.$value.'" name="'.$name.'" >';

    }
    public function toHtml(){
        $css='<link rel="stylesheet" href="../View/CSS/style.css">';
        $form=$this->createForm();
        return $css.$form;
               
    }

}
?>
