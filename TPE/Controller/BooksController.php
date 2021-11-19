<?php
require_once "./View/BooksView.php";
require_once "./Model/BooksModel.php";
require_once "./Model/GenresModel.php";
require_once "./Helpers/AuthHelper.php";


class BooksController{

    private $view;
    private $model;
    private $modelGenre;
    private $authHelper;


    function __construct(){
        $this -> view = new BooksView();
        $this -> model = new BooksModel();
        $this -> modelGenre= new GenresModel();
        $this -> authHelper = new AuthHelper();
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."libro");
    }

    function add() {
        $this->authHelper->checkLoggedIn(); 
        if($_FILES['cover']['type'] == "image/jpg" || $_FILES['cover']['type'] == "image/jpeg"  || $_FILES['cover']['type'] == "image/png" ){
            $this->model->insert($_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis'], $_FILES['cover']);
        }
        else
            $this->model->insert($_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis']);
        $this->showHomeLocation();
    }
    


    function delete($bookId) {
        $this->authHelper->checkLoggedIn();

        $this->model->delete($bookId);
        $this->showHomeLocation();
    }

    function filterByGenre($genreId){
        $books = $this->model->getByGenre($genreId);
        $genre = $this->modelGenre->getItem($genreId);
        $this->view->list($books, $genre);
    }

    function showAdm(){
        $this->authHelper->checkLoggedIn(); 

        $genres = $this->modelGenre->getNameAndId();
        $books = $this->model->getAll();
        $this->view->adm($books, $genres);
    }

    function showHome(){    
        $genres = $this->modelGenre->getNameAndId();
        $books = $this->model->getAll();
        $this->view->main($books, $genres);
    }
    
    function showItem($id){
        $item = $this->model->getItem($id);
        $genre = $this->modelGenre->getName($item->Genre_id)->Genre;
        $this->view->detail($item, $genre);
    }


    function update($id) {
        $this->authHelper->checkLoggedIn(); 

        if (isset($_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis'])) {  
            if($_FILES['cover']['type'] == "image/jpg" || $_FILES['cover']['type'] == "image/jpeg"  || $_FILES['cover']['type'] == "image/png"){
                $this->model->update($id, $_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis'], $_FILES['cover']);}
           else
                $this->model->update($id, $_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis']);
            $this->showItem($id);
        } else {
            $genres = $this->modelGenre->getNameAndId();
            $fields = $this->model->getItem($id);
            $this->view->editDitail($genres, $fields, $id);
        
        }
    }
}