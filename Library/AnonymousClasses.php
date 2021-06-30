<?php 
declare(strict_types =  1);
class AnonymousClasses 
{
    
    public function TUser(array $array)
    {
        return new class($array){
            public $NID;
            public $Name;
            public $LastName;
            public $Email;
            public $Password;
            public $Phone;
            public $Direction;
            public $User;
            public $Role;
            public $Image;
            public $Is_active;
            public $State;
            public $Date;
            function __construct($array){
                if(0 < count($array)){
                    if(!empty($array["NID"])) {$this->NID = $array["NID"];}
                    if(!empty($array["Name"])) {$this->Name = $array["Name"];}
                    if(!empty($array["LastName"])) {$this->LastName = $array["LastName"];}
                    if(!empty($array["Email"])) {$this->Email = $array["Email"];}
                    if(!empty($array["Password"])) {$this->Password = $array["Password"];}
                    if(!empty($array["Phone"])) {$this->Phone = $array["Phone"];}
                    if(!empty($array["Direction"])) {$this->Direction = $array["Direction"];}
                    if(!empty($array["User"])) {$this->User = $array["User"];}
                    if(!empty($array["Role"])) {$this->Role = $array["Role"];}
                    if(!empty($array["Image"])) {$this->Image = $array["Image"];}
                    if(!empty($array["Is_active"])) {$this->Is_active = $array["Is_active"];}
                    if(!empty($array["State"])) {$this->State = $array["State"];}
                    if(!empty($array["Date"])) {$this->Date = $array["Date"];}
                }
            }
        };
    }
}


?>