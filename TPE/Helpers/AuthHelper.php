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

    function checkAdmin(){
        if ( (isset($_SESSION['USERNAME']) && ($_SESSION['ROLE'] == "admin")) )
            return true;
        else
            header("Location: ".BASE_URL."genero/home");
            die();
    }

    function logout(){

        session_destroy();
        header("Location: ".BASE_URL."genero/home");

    }
}