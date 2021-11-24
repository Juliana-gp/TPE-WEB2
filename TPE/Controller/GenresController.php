<?php
require_once "./Model/GenresModel.php";
require_once "./View/GenresView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Model/BooksModel.php";


class GenresController{
    private $model;
    private $view;
    private $authHelper;
    private $modelBook;


    function __construct(){
        $this -> model = new GenresModel();
        $this -> view = new GenresView();
        $this -> authHelper = new AuthHelper();
        $this -> modelBook = new BooksModel();
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."genero");
    }

    function add() {
        $this->authHelper->checkAdmin();
        $this->model->insert($_POST['genre'], $_POST['description']);
        $this->showHomeLocation();
       
    }

    function delete($id){
        $this->authHelper->checkAdmin();
        $books = $this->modelBook->get(array('Genre_id'=>$id));
        if ($books){    
            $this->showAdm("El género que quiere borrrar tiene libros");
        }else{          
            $this->model->delete($id);
            $this->showAdm("El género ha sido borrado");
        }
    }

    function showAdm($respuesta=null){
        $this->authHelper->checkAdmin();
        $genres = $this->model->getAll();
        $this->view->adm($genres, $respuesta);
    }

    function showHome($respuesta = null){
        $genres = $this->model->getAll();
        $this->view->main($genres, $respuesta);
    }
    
    function showItem($id){
        $item = $this->model->getItem($id);
        $this->view->detail($item);
    }


    function update($id) {
        $this->authHelper->checkLoggedIn();
        
        if (isset($_POST['genre'], $_POST['description'])) { 
            $this->model->update($id, $_POST['genre'], $_POST['description']);
            $this->showItem($id);

        } else {
            $fields = $this->model->getItem($id);
            $this->view->editDitail($fields);
        
        }         
    }
}