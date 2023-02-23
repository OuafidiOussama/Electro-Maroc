<?php

    //Load Models and views
    class Controller{
        //Load the Model
        public function model($model){
            //Require the Model's file
            require_once '../app/models/' . $model . '.php';

            //instantiate the Model
            return new $model();
        }

        //Load the View
        public function view($view, $data = []){
            //Check for the View File 
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }
            //if the View File doesn't exist
            else{
                die('View does not exist');
            }
        }
    }