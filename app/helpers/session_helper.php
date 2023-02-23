<?php

    session_start();

    function isAdminLogedIn(){
        if(isset($_SESSION['admin_id'])){
            return true;
        }else{
            return false;
        }
    }
    function isUserLogedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }