<?php
class UserController extends Controllers
{
    public function __construct(){
        parent::__construct();
    }

    public function Register()
    {
        $roles = $this->role->GetRoles();
        $model = Session::getSession("model");
        $model2 = Session::getSession("model2");
        if(null != $model && null != $model2){
            $array = unserialize($model);
            $array1 = unserialize($model2);
            if($array != null && $array1 != null){
                $model = $this->TUser($array);
                $model2 = $this->TUser($array1);
                
                $rol = array(array("role" => $model->Role));
                $i = 1;
                foreach ($roles as $key => $value){
                    if($model->Role != $value["role"]){
                        $rol[$i] = array("role" => $value["role"]);
                        $i++;
                    }
                }
                $this->Views->Render($this,"register",$model,$model2,$rol);
            } else{
                $this->Views->Render($this,"register",null,null,$roles);
            }
        } else {
            $this->Views->Render($this,"register",null,null,$roles);
        }

    }

    public function AddUser()
    {
        $execute = true;
        $image = null;

        if(empty($_POST["nid"])){
            $nid = "Ingrese el nid";
            $execute = false;
        }
        
        if(empty($_POST["name"])){
            $name = "Ingrese el nombre";
            $execute = false;
        }

        if(empty($_POST["lastname"])){
            $lastname = "Ingrese el apellido";
            $execute = false;
        }

        if(empty($_POST["email"])){
            $email = "Ingrese el email";
            $execute = false;
        } 
        
        /*else { if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { $email = "Ingrese un email valido"; $execute = false; }
        }*/

        if(empty($_POST["password"])){
            $password = "Ingrese el pasword";
            $execute = false;
        }

        if(empty($_POST["phone"])){
            $phone = "Ingrese su numero de celular ";
            $execute = false;
        } 

        if(empty($_POST["direction"])){
            $direction = "Ingrese su direccion ";
            $execute = false;
        }

        if(empty($_POST["user"])){
            $user = "Ingrese su nombre de usuario ";
            $execute = false;
        }

        if("Seleccione un role" == $_POST["role"]){
            $role = "Seleccione un role";
            $execute = false;
        }

        $img = file_get_contents(URL.RQ.VIEWS."img/default.png");
        $image = base64_encode($img);

        if(isset($_FILES['file_image'])){
            $archivo = $_FILES['file_image']['tmp_name'];
            if($archivo != null){
                $contents = file_get_contents($archivo);
                $image = base64_encode($contents);
            } else{
                $model = Session::getSession("model");
                if(null != $model){
                    $array1 = unserialize($model);
                    $image = $array1["Image"];
                }else{
                   $img = file_get_contents(URL.RQ.VIEWS."img/default.png");
                   $image = base64_encode($img); 
                }
            }
        }
        

        $model = array(
            "NID"=>$_POST["nid"],
            "Name"=>$_POST["name"],
            "LastName"=>$_POST["lastname"],
            "Email"=>$_POST["email"],
            "Password"=>$_POST["password"],
            "Phone"=>$_POST["phone"],
            "Direction"=>$_POST["direction"],
            "User"=>$_POST["user"],
            "Role"=>$_POST["role"],
            "Image"=>$image,
        );

        Session::setSession("model",serialize($model));
        if($execute){
            $value = $this->model->AddUser($this->TUser($model));
            if(is_bool($value)){
                Session::setSession("model","");
                Session::setSession("model2","");
                header("Location: User");
            } else{
                Session::setSession("model2",serialize(array(
                    "Role"=>$value,
                )));
                header("Location: Register");
            }
            
        }else{
            Session::setSession("model2",serialize(array(
                "NID"=>$nid,
                "Name"=>$name,
                "LastName"=>$lastname,
                "Email"=>$email,
                "Password"=>$password,
                "Phone"=>$phone,
                "Direction"=>$direction,
                "User"=>$user,
                "Role"=>$role,
            )));

            header("Location: Register");
            
        }
    }

    public function User()
    {
        $this->Views->Render($this,"user",null,null,null);
    }

    public function Cancel()
    {
        Session::setSession("model","");
        Session::setSession("model2","");
        header("Location: Register");
    }
}


?>