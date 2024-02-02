<?php
class View_Product{
    public function __construct(){

    }
    public function createForm(){
        $div='<div class="form-group">';
        $form='<div class="box">
                <div class="container">
                    <div class="title">Product Information</div>
                    <div class="content">';
                        $form.='<form action="" method="POST">';
                            $form.=$div;
                                $form.=$this->createLabel('Product name ');
                                $form.=$this->createTextField('pdata[product_name]','product_name');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('SKU ');
                                    $form.=$this->createTextField('pdata[sku]','sku');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Product Type ');
                                    $arr=["-- select --","Bar & Game Room", "Bedroom", "Decor", "Dining & Kitchen", "Lighting", "Living Room", "Mattresses", "Office", "Outdoor"];
                                    $form.=$this->createDropDown('pdata[product_type]',$arr,'product_type');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Shipping Cost ');
                                    $form.=$this->createTextField('pdata[shipping_cost]','shipping_cost');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Total Cost '); 
                                    $form.=$this->createTextField('pdata[total_cost]','total_cost');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Price ');
                                    $form.=$this->createTextField('pdata[price]','price');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Status ');
                                    $arr=["-- select --","Enabled", "Disabled"];
                                    $form.=$this->createDropDown('pdata[status]',$arr,'status');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Created At ');
                                    $form.=$this->createDateField('pdata[created_at]','created_at');
                            $form.='</div>';
                            $form.=$div;
                                    $form.=$this->createLabel('Updated At ');
                                    $form.=$this->createDateField('pdata[updated_at]','updated_at');
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
    public function createRadioButton($name,$value,$id=''){
        return '<input type="radio" id="'.$id.'" name="'.$name.'" value="'.$value.'">';

    }
    public function createDropDown($name,$categories,$id='',$value=''){
        $drop_down='<select id="'.$id.'" name="'.$name.'" value="'.$value.'">';
        foreach ($categories as $category) {
            $drop_down.='<option value="'. $category .'">' . $category . '</option>';
        }
        $drop_down.='</select>';
        return $drop_down;
    }
    public function  createDateField($name='',$id='',$value=''){
        return '<input type="date"  id="'.$id.'" value="'.$value.'" name="'.$name.'" >';

    }
    public function toHtml(){
        $css='<link rel="stylesheet" href="View/CSS/style.css">';
        $form=$this->createForm();
        return $css.$form;
               
    }

}
?>
