<?php

 class home extends Controller
 {

     public function index()
     {

        $user =$this->model('User');
        $this->view("home/index");
     }

        public function about($date='')
        {
    
            $this->view("home/about",['name'=> $date['name'] ]);
        }

 }
