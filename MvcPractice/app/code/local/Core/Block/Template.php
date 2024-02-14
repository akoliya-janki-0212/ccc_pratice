
<?php
class Core_Block_Template extends Core_Block_Abstract
{
    protected $_child=[];
    public function toHtml()
    {
        $this->render();
    }
    public function addChild($key, $value)
    {
        $this->_child[$key]=$value;
        //print_r($this->_child['head']);
    }
    public function removeChild($key)
    {
    }
    public function getChild($key)
    {
        
        // print_r($this->_child[$key]);
        return $this->_child[$key];
    }
    public function getChildHtml($key){
        
        // echo 'rfgv';
       return $this->getChild($key)->toHtml();
    }
    public function getRequest(){
        return Mage::getModel('core/request');
    }
    /* public function setTemplate($template)
    
    {
        $this->template = $template;
    }
    public function getTemplate()
    {
        return $this->template;
    } */
}

?>