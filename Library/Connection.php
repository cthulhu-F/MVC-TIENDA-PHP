<?php 
class Connection 
{
    function __construct(){
        $this->db = new QueryManager("root","","sysventas");
    }
}

?>