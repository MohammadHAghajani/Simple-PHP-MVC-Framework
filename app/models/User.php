<?php
require_once "dbConnect.php";

class User extends dbConnect
{
    
    private $conn; 
    public function __construct() { 
       $dbcon = new parent(); 
      
       $this->conn = $dbcon->connect();
    }

    public function select($where='' , $other='' ){
        if($where != '' ){  
          $where = 'where ' . $where; 
        }
        $sql = "SELECT * FROM  category " .$where. " " .$other;
        $sele = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $sele;
     }


   

    

}