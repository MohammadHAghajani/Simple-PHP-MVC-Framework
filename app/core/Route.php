<?php

class Route{

    protected $controller = 'home';
    protected $method = 'index';
    protected $params =[];

    public static function get($route, $function){

       $self = new static;
       $url=self::parseUrl();
      
        $result=self::CheckRoute($route, $url);


        if($result){
            $params = self::getParams($route, $url);
            $function=explode("@",$function);
            $self->controller=$function[0];
            $self->method=$function[1];
            if(file_exists('../app/controllers/'.$function[0].'.php')){
                $self->controller=$function[0];
                require_once('../app/controllers/'.$self->controller.'.php');
                if(method_exists($self->controller,$function[1])){
                    $self->method=$function[1];
                 }
                 else{
                     return false;
                 }
        }
        else{
            return false;
        }
            $controller = new $self->controller;
           call_user_func_array([$controller ,$self->method],[$params]);
            die();
        }
        else{
            return false;
        }
        
    }

    public static function CheckRoute($route, $url=""){
       
        if($route=="/" and $url==""){
            return true;
        }


        if($route!=""){
            $route=explode('/',$route);
        }
        else
        {
    
         if($route==$url){
            return true;
         }
         else{
            return false;
         }
        }
  
        if($url!=""){
        if( count($url) >= count($route) ){
           
           for($i=0;sizeof($route)>$i;$i++){
            if($route[$i]!= $url[$i] && $route[$i][0] != "{" ){
                return false;
            }
           }


        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
     
    
        return true;
    }

    public static function getParams($route, $url_Request){

        $route=explode('/',$route);
     
        $params = array();

        foreach($route as $key => $value){
            
            if($value[0] == '{'){
             
     
                $val=str_replace("{","",$value);
                    $val=str_replace("}","",$val);
                $params[$val] = $url_Request[$key];
            }
        }

        if(sizeof($params) == 0){
            return [];
        }

        return $params;
    }

    
    public static function parseUrl(){

        if(isset($_GET['url'])){
        
        
         return $url=explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
        
        }
        
        }
  
  



}