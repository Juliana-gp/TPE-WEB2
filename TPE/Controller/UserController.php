<?php
require_once "./Model/UserModel.php";
require_once "./View/UserView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Model/ComsModel.php";


class UserController{

    private $model;
    private $view;
    private $authHelper;
    private $modelComments;

    function __construct(){
        $this -> model = new UserModel();
        $this -> view = new UserView();
        $this ->  authHelper = new AuthHelper();
        $this -> modelComments = new ComsModel();
    }

    function add(){
        if(isset($_POST['usuario'], $_POST['password'])) {
            $user = $this->model->addUser();
            $_SESSION['USERNAME'] = $_POST['usuario'];
            $_SESSION['USERID'] = $user;
            $_SESSION['ROLE'] = "user";
            //echo($user);
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
                $_SESSION['USERID'] = $user->id_user;
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

    function showUsers($respuesta = null){
        $this->authHelper->checkAdmin();
        $users = $this->model->getUsers();
        $this->view->showFormUsers($users, $respuesta);
    }

  
    function delete($userId){
        $this->authHelper->checkAdmin();
        if ($userId != $_SESSION['USERID']){
           $comsUser = $this -> modelComments -> getCommentUser($userId);
           /* Esta es una opción para reutilizar la consulta con filtros pero la descartamos 
                $filters = array(
                    'book' => null,
                    'score' => null,
                    'user' => $userId, 
                    'orderBy' => null,
                    'ASC' => null
                );
                $comsUser = $this -> modelComments -> getComments($filters);
            */

            if (!$comsUser){
                $this->model->deleteUser($userId);
                $this->showUsers("Usuario eliminado");
            }
            else
                $this->showUsers("No se puede borrar, el usuario tiene comentarios"); 
        }
        else
            $this->showUsers("No se puede borrar su mismo usuario"); 
    }



    function update($userId){
       $this->authHelper->checkAdmin();
        if ($userId == $_SESSION['USERID'])
            $this->showUsers("No se puede cambiar su propio rol"); 
        else if ($_POST['rol']){
            $this->model->updateUserRole(($_POST['rol']), $userId);
            $this->showUsers("El rol se cambio correctamente");
        }
      
    }
}