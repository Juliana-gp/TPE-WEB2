<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class UserView{

    private $smarty;

    function __construct(){
        $this ->smarty = new Smarty();
    }

    function showHome(){
        header("Location: ".BASE_URL."genero/home");   
    }

    function showLoginForm($error = ""){
        $this ->smarty->assign('error', $error);
        $this ->smarty->assign('title', 'Log In');
        $this ->smarty->assign('action', 'login');     
        $this ->smarty->assign('btnTitle', 'Entrar'); 
        $this ->smarty->assign('text', 'Si no tienes un usuario, puedes hacer click aquí'); 
        $this ->smarty->assign('action2', 'crear');
        $this ->smarty->display('templates/login.tpl');
    }


    function showNewUser($error = ""){
        $this ->smarty->assign('error', $error);
        $this ->smarty->assign('title', 'Crear Usuario');
        $this ->smarty->assign('action', 'add');     
        $this ->smarty->assign('btnTitle', 'Crear'); 
        $this ->smarty->assign('text', 'Si ya tienes usuario, puedes hacer click aquí');
        $this ->smarty->assign('action2', ''); 
        $this ->smarty->display('templates/login.tpl');
    }

}