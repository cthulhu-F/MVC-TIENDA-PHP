<?php
class ErrorController extends Controllers 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Error($url)
    {
        $this->Views->Render($this,"error",$url,null,null);
    }
    
}


?>