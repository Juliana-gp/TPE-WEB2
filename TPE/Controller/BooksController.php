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

        $name = $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], 'images/covers/'.$name );
        $this->model->insert($_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $name, $_POST['synopsis']);
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
        $logged = $this->authHelper->isLogged();
        $this->view->list($logged, $books, $genre);
    }

    function showAdm(){
        $this->authHelper->checkLoggedIn(); 

        $logged = true;
        $genres = $this->modelGenre->getNameAndId();
        $books = $this->model->getAll();
        $this->view->adm($logged, $books, $genres);
    }

    function showHome(){    
        $logged = $this->authHelper->isLogged();
        $genres = $this->modelGenre->getNameAndId();
        $books = $this->model->getAll();
        $this->view->main($logged, $books, $genres);
    }
    
    function showItem($id){
        $logged = $this->authHelper->isLogged();
        $item = $this->model->getItem($id);
        $genre = $this->modelGenre->getName($item->Genre_id)->Genre;
        $this->view->detail($logged, $item, $genre);
    }


    function update($id) {
        $this->authHelper->checkLoggedIn(); 

        if (isset($_POST['title'], $_POST['author'], $_POST['ISBN'],   
                $_POST['genre'], $_POST['synopsis'])) {  
            
            $name = $_FILES['cover']['name'];
            if ($name && $name != "") {
                move_uploaded_file($_FILES['cover']['tmp_name'], 'images/covers/'.$name );
            }
                
            $this->model->update($id, $_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis'], $name);
            $this->showItem($id);

        } else {

            $logged = $this->authHelper->isLogged();
            $genres = $this->modelGenre->getNameAndId();
            $fields = $this->model->getItem($id);
            $this->view->editDitail($logged, $genres, $fields, $id);
        
        }
    }
}