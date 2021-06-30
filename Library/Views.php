<?php 
class Views {
    public function Render($controller,$view,$model,$model2,$model3){
        $className = explode("Controller",get_class($controller));
        $controller = $className[0];
        require VIEWS.DFT."head.php";
        require VIEWS.$controller."/".$view.".php";
        require VIEWS.DFT."footer.php";
    }
    
}

?>