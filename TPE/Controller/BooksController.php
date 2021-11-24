<?php
require_once "./View/BooksView.php";
require_once "./Model/BooksModel.php";
require_once "./Model/GenresModel.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Model/ComsModel.php";



class BooksController{

    private $view;
    private $model;
    private $modelGenre;
    private $authHelper;
    private $modelComs;


    function __construct(){
        $this -> view = new BooksView();
        $this -> model = new BooksModel();
        $this -> modelGenre= new GenresModel();
        $this -> authHelper = new AuthHelper();
        $this -> modelComs = new ComsModel();
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."libro");
    }

    function add() {
        $this->authHelper->checkAdmin(); 
        if($_FILES['cover']['type'] == "image/jpg" || $_FILES['cover']['type'] == "image/jpeg"  || $_FILES['cover']['type'] == "image/png" ){
            $this->model->insert($_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis'], $_FILES['cover']);
        }
        else
            $this->model->insert($_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $_POST['synopsis']);
        $this->showHomeLocation();
    }
    
    function delete($bookId) {
        $this->authHelper->checkAdmin();
        $coms=$this->modelComs->getCommentBook($bookId);
        if ($coms){
            $this->showAdm("No se puede borrar este libro porque tiene comentarios asociados");
        }
        else{
            $this->model->delete($bookId);
            $this->showAdm("Libro eliminado");
        }
    }

    function filter($genreId = null){
        $params =  array(
            'Title' => null,
            'Author' => null,
            'ISBN' => null,
            'Synopsis' => null,
            'Genre_id' => null
        );
        if($genreId){
            $params['Genre_id'] = $genreId;
            $books = $this->model->get($params);
            $genre = $this->modelGenre->getItem($genreId);
            $this->view->list($books, $genre); 
        } else {
            if(isset($_POST['title']))
                $params['Title'] = $_POST['title'];
            if(isset($_POST['author']))
                $params['Author'] = $_POST['author'];
            if(isset($_POST['ISBN']))
                $params['ISBN'] = $_POST['ISBN'];
            if(isset($_POST['synopsis']))
                $params['Synopsis'] = $_POST['synopsis'];
            if( isset( $_POST['genre']) && $_POST['genre'] != "null")
                $params['Genre_id'] = $_POST['genre'];

            $genres = $this->modelGenre->getAll();
            $books = $this->model->get($params);
            $this->view->search($books, $genres);     
        }
    }

    function showAdm($msj = null){
        $this->authHelper->checkAdmin();
        $genres = $this->modelGenre->getNameAndId();
        $books = $this->model->get();
        $this->view->adm($books, $genres, $msj);
    }

    function showHome(){    
        $genres = $this->modelGenre->getNameAndId();
        $books = $this->model->get();
        $this->view->main($books, $genres);
    }
    
    function showItem($id){
        $item = $this->model->getItem($id);
        $genre = $this->modelGenre->getName($item->Genre_id)->Genre;
        $this->view->detail($item, $genre);
    }


    function update($id) {
        $this->authHelper->checkAdmin();

        if(isset($_POST['cover'])){
            if($_POST['cover'] == "Eliminar foto"){
                $this->model->updateCover($id, null);
            }
        }

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