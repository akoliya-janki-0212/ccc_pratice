<?php
class Core_Block_Form_Text extends Core_Block_Form_Abstract
{
    public function toHtml()
    {
        $input = '<input type="text"';
        if ($this->getAttribute()) {
            foreach ($this->getAttribute() as $key => $value) {
                $input .= ' ' . $key . '="' . $value . '"';
            }
        }
        $input .= '>';
        return $input;
    }
}
?>