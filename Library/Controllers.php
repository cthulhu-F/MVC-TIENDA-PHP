<?php
class Controllers extends AnonymousClasses{
    public function __construct() {
        date_default_timezone_get("America/Buenos_Aires");
        Session::star();
        $this->Views = new Views();
        $this->role = new Roles();
        $this->LoadClassModels();
    }
    
    public function LoadClassModels(){
        $className = explode("Controller",get_class($this));
        $model = $className[0]."_model";
        $path = "Models/".$model.".php";

        if (file_exists($path)){
            require $path;
            $this->model = new $model();
        }
    }
}


?>