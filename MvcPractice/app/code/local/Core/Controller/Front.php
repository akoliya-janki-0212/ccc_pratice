<?php
class Core_Controller_Front
{
    public function init()
    {
        $request = Mage::getModel('core/request');
        $actionName = $request->getActionName();
        $actionName=stristr($actionName,'?',true);
        $actionName= $actionName.'Action';
        $className = $request->getFullControllerClass();
        echo $className;
        $layout = new $className(); 
        $layout->$actionName();
    }
}
?>