<?php
require_once "./Model/GenresModel.php";
require_once "./View/GenresView.php";
require_once "./Helpers/AuthHelper.php";


class GenresController{
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this -> model = new GenresModel();
        $this -> view = new GenresView();
        $this ->  authHelper = new AuthHelper();
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."genero");
    }

    function add() {
        $this->authHelper->checkLoggedIn(); 

        $this->model->insert($_POST['genre'], $_POST['description']);
        $this->showHomeLocation();
    }

    function delete($id){
        $this->authHelper->checkLoggedIn();

        $this->model->delete($id);
        $this->showHomeLocation();
    }

    function showAdm(){
        $this->authHelper->checkLoggedIn();

        $genres = $this->model->getAll();
        $logged = true;
        $this->view->adm($logged, $genres);

    }

    function showHome(){
        $logged = $this->authHelper->isLogged();
        $genres = $this->model->getAll();
        $this->view->main($logged, $genres);
    }
    
    function showItem($id){
        $logged = $this->authHelper->isLogged();
        $item = $this->model->getItem($id);
        $this->view->detail($logged, $item);
    }


    function update($id) {
        $this->authHelper->checkLoggedIn();
        
        if (isset($_POST['genre'], $_POST['description'])) { 
            $this->model->update($id, $_POST['genre'], $_POST['description']);
            $this->showItem($id);

        } else {

            $logged = true;
            $fields = $this->model->getItem($id);
            $this->view->editDitail($logged, $fields);
        
        }         
    }
}