<?php
class Core_Controller_Front
{
    public function init()
    {
        $request = new Core_Model_Request();
        //echo $request->getModuleName();
        //echo $request->getControllerName();
        $actionName = $request->getActionName();
        $className = $request->getFullControllerClass();
        echo $className;

        $className = new Page_Controller_Index();
        $layout = new $className();
        $layout->$actionName();
    }

}
?>