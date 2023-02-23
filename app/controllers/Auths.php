<?php 
    class Auths extends Controller{
        public function __construct(){

        }

        public function login(){
            $data = [

            ];

            $this->view('auths/admin_login',$data);
        }
    }