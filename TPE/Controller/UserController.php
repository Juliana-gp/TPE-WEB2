<?php
require_once "./Model/UserModel.php";
require_once "./View/UserView.php";
require_once "./Helpers/AuthHelper.php";


class UserController{

    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this -> model = new UserModel();
        $this -> view = new UserView();
        $this ->  authHelper = new AuthHelper();
    }

    function add(){
        if(isset($_POST['usuario'], $_POST['password'])) {
            $this->model->addUser();
            $_SESSION['USERNAME'] = $_POST['usuario'];
            $_SESSION['ROLE'] = "user";
            $this->view->showHome();
        } else {
            $this->view->showNewUser();
        }
    }

    function logout(){
        $this->authHelper->logout();
    }

    function login(){
        if (!empty($_POST['usuario']) && !empty($_POST['password']) ){
            $nameUser = $_POST['usuario'];
            $password = $_POST['password'];

            $user = $this->model->getUser($nameUser);

            session_start();
            if ($user && password_verify($password, $user->password)){
                $_SESSION['USERNAME'] = $nameUser;
                $_SESSION['ROLE'] = $user->role;
                $this->view->showHome();
            }
            else{
                $this->view->showLoginForm("Acceso denegado");
            }
        }
        else{
            $this->view->showLoginForm();
        }
    }

    function showUsers(){
        $users = $this->model->getUsers();
        $this->view->showFormUsers($users);
    }

    //Falta controlar que no se borre a si mismo
    function delete($userId){
        if ($this->authHelper->checkAdmin()){
            $this->model->deleteUser($userId);
            $this->showUsers();
        }
        else 
            header("Location: ".BASE_URL."usuario");
    }



    function update($userId){
        if ($this->authHelper->checkAdmin()){

            if ($_POST['rol']){
                $this->model->updateUserRole(($_POST['rol']), $userId);
                $this->showUsers();
            }
        }
        else 
            header("Location: ".BASE_URL."usuario");

    }
}