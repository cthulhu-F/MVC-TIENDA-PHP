<?php
    declare (strict_types = 1);
    class Roles extends Connection
    {
            public function __construct()
            {
                parent::__construct();
            }
            public function SetRoles()
            {
                try {
                    $this->db->pdo->beginTransaction();
                    $listRoles = array("admin","user");
                    $where = " WHERE role = :role";
                    foreach ($listRoles as $key => $value){
                        $roles = $this->db->Select1("role","troles",$where,array("role" => $value));
                        if(is_array($roles)){
                            if(0 == count($roles["results"])){
                                $query = "INSERT INTO troles (role) VALUES (:role)";
                                $sth = $this->db->pdo->prepare($query);
                                $sth->execute((array)$this->TRoles(array($value)));

                            }
                        }else{
                            break;
                            return $roles;
                        }
                    }

                    $this->db->pdo->commit();
                } catch (\Throwable $th) {
                    $this->db->pdo->rollback();
                    return $th->getMessage();
                }
            }

            public function TRoles(array $array)
            {
                return new class($array){
                    var $role;
                    function __construct($array){
                        if (0 < count($array)) {
                            $this->role = $array[0];
                        }
                    }
                };
            }
            public function GetRoles(){
                $roles = $this->db->select1("*",'TRoles',null,null);
                if(is_array($roles)){
                    if (0 < count($roles["results"])){
                        return $roles["results"];
                    }
                } else{
                    return $roles;
                }
            }
    }
    
?>