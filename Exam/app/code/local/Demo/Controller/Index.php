<?php
class Demo_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->removeChild('header')->removeChild('footer');
        $child = $layout->getChild('content');
        $ViewProduct = $layout->createBlock('demo/form');
        $child->addChild('form', $ViewProduct);
        $layout->toHtml();
    }
    public function saveAction()
    {

        if (!empty($this->getRequest()->getParams('id'))) {
            // Fetch child data based on the specific Parent 
            $postId = $this->getRequest()->getParams('id');
            $childCollection = Mage::getModel('demo/child')
                ->getCollection()
                ->addFieldToFilter('parant_id', $postId)
                ->getData();
            if ($childCollection) {
                foreach ($childCollection as $_child) {
                    // echo '<option value="' . $_child->getChildId() . '">' . $_child->getName() . '</option>';
                    $option[$_child->getId()] = $_child->getName();
                }
                print_r(json_encode($option));
            }
        }
    }
}

?>