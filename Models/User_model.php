<?php 
class User_model extends Connection
{
    public function __construct(){
        parent::__construct();
    }
    public function AddUser($model)
    {
        try {
            $this->db->pdo->beginTransaction();
            $where = " WHERE Email = :Email";
            $response = $this->db->Select1("Email","tusers",$where,array("Email" => $model->Email));
            if(is_array($response)){
                $response = $response["results"];
                if(0 == count($response)){
                    $model->Is_active = true;
                    $model->State = true;
                    $model->Date = date("Y/m/d");
                    $model->Password = password_hash($model->Password,PASSWORD_DEFAULT);
                    $query = "INSERT INTO tusers (NID,Name,LastName,Email,Password,Phone,Direction,User,Role,Image,Is_active,State,Date) VALUES (:NID, :Name, :LastName, :Email, :Password, :Phone, :Direction, :User, :Role, :Image, :Is_active, :State, :Date)";
                    $sth = $this->db->pdo->prepare($query);
                    $sth->execute((array)$model);
                    $this->db->pdo->commit();
                    return true;
                } else{
                    return "El Email ya esta registrado";
                }
            }else{
                return $response;
            }
            
            
            
        } catch (\Throwable $th) {
            $this->db->pdo->rollback();
            return $th->getMessage();
        }
        
    }
    
    
}

?>