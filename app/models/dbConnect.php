<?php
class dbConnect{

    public function connect(){
         $host = 'localhost';
         $user = 'root';
         $pass = '';
         $db = 'bombe';
         $connection = mysqli_connect($host,$user,$pass,$db); 
         return $connection;
     }

}