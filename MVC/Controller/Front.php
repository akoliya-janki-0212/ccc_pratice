<?php
class Controller_Front{
    public function init(){
        $request=new Model_Request();
        $uri=$request->getRequestUri();
        $className='View_'.ucwords(rtrim((str_replace('/','_',$uri)),'_'));
        $layout=new $className();
        return $layout->toHtml();
    }
}
?>