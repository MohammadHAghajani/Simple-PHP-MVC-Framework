<?php

class Controller{



    public function  model($model){


       require_once ('../app/models/'.$model.'.php');

    $mod=new $model();
       return $mod;
    }

    public function view($view,$data=[]){

        require_once ('../app/views/'.$view .'.php');
    }


}