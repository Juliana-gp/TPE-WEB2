<?php

session_start();

class AuthHelper{

    function __construct(){
        
    }

    function checkLoggedIn(){
        
        if (!isset($_SESSION['USERNAME'])){
            header("Location: ".BASE_URL."usuario");
            die();
        }
        
    }

    
    function isLogged(){   //checkLoggedInBoolean
       
        if (isset($_SESSION['USERNAME'])){
            return true;
        }
        else {
            return false;
        }
    }


    function logout(){
        
        session_destroy();
        header("Location: ".BASE_URL."genero/home");

    }
}