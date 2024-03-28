<?php
class Core_Controller_Front
{
    public function init()
    {
        //Mage::getSingleton('core/session');
        $request = Mage::getModel('core/request');
        $actionName = $request->getActionName();

        $actionName = $actionName . 'Action';
        $className = $request->getFullControllerClass();
        $layout = new $className();
        $layout->$actionName();
    }
}
?>