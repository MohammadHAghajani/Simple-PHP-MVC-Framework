<?php
require_once("Route.php");

class App{

    public function __construct(){

    echo require_once("../app/routes.php");
       

    }

    
public function parseUrl(){

if(isset($_GET['url'])){


 return $url=explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));

}

}

}