<?php
class Core_Block_Form_Abstract
{
    protected $_attribute = [];
    public function getAttribute()
    {
        return $this->_attribute;
    }
    public function setAttribute($attribute)
    {
        $this->_attribute = $attribute;
        return $this;
    }
    public function addAttribute($key, $value)
    {
        $this->_attribute[$key] = $value;
        return $this;
    }
    public function removeAttribute($key)
    {
        if (isset ($this->_attribute[$key])) {
            unset($this->_attribute[$key]);
        }
        return $this;
    }
}
?>