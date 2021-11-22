<?php

require_once "./Model/ComsModel.php";
require_once "./View/ApiView.php";
require_once "./Model/BooksModel.php";
require_once "./Model/UserModel.php";


class ApiComsController{

    private $model;
    private $view;
    private $userModel;
    private $booksModel;

    function __construct(){
        $this->model = new ComsModel();
        $this->view = new ApiView();
        $this->userModel = new UserModel();
        $this->booksModel = new BooksModel();
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

    function getComments() {
        $filters = array();    
        if (isset($_GET['book']) && $_GET['book']) {
            $filters['book'] = $_GET['book'];
        }
        if (isset($_GET['user']) && $_GET['user']) {
            $filters['user'] = $_GET['user'];
        }
        $comentarios = $this->model->getComments($filters);
        if ($comentarios)
            return $this->view->response($comentarios, 200);
        else 
            return $this->view->response("XXXXX", 000);                                 //VER RESPUESTA
    }

    //Falta definir control usuario
    function addComment($params = null) {
        $body = $this->getBody();
        if (isset($body->comment) && isset($body->score) && isset($body->id_user) && isset($body->id_book) ){
            $user = $this->userModel->getUserById($body->id_user);      //Ver como recibe el usuario!!!!!
            if ($user){
                $item = $this->booksModel->getItem ($body->id_book);
                if ($item){
                    $id = $this->model->addComment($body->comment, $body->score, $body->id_user, $body->id_book);
    
                    if ($id != 0)
                        return $this->view->response("a id=$id", 200);             // ok
                    else 
                        return $this->view->response("b", 000);                    // No se pudo insertar
                } else
                    return $this->view->response("c", 000);                        // No se encontró el item que se quiere comentar                           
            } else
                return $this->view->response("d", 000);                            // No se reconocio el id de usuario           
        } else
            return $this->view->response("e", 000);                                // No estan todos los campos llenos
    }

    //Falta definir control ADMIN
    function deleteComment($params = null){
        $idComment = $params[":ID"];
        $comment = $this->model->getComment($idComment);
        if ($comment) {
            $this->model->deleteComment($idComment);
            return $this->view->response("XXXXX id=$idComment fue borrado", 200);   // ok
        } else {
            return $this->view->response("XXXXX id=$idComment no existe", 404);     // no se pudo borrar
        }

    }

    //Estaria ok pero no lo necesitamos
    function getComment($params = null){
        $idComment = $params[":ID"];
        $comment = $this->model->getComment($idComment);
        if ($comment) {
            return $this->view->response($comment, 200);   // ok
        } else {
            return $this->view->response("XXXXX id=$idComment no existe", 404);     // no se pudo borrar
        }
    }
 
    function getCommentsOrd($params = null){
        $body = $this->getBody();
        if (isset($body->orderBy)){ //SE PUEDE CONTROLAR QUE ESE ORDERBY SEA UN NOMBRE DE UNA COLUMNA ???
            if ((isset($body->crit)) && (($body->crit == "ASC") || ($body->crit == "DESC")))
                $comentarios = $this->model->getComments($body->orderBy, $body->crit);
            else
                $comentarios = $this->model->getComments($body->orderBy, "ASC");
        } else 
            $comentarios = $this->model->getComments();
        if ($comentarios)
            return $this->view->response($comentarios, 200);        //VER RESPUESTA
        else 
            return $this->view->response("XXXXX", 000);             //VER RESPUESTA
    }

    //---------------------------------------
    function editComment($params = []){
        $idComment = $params[":ID"];
        $comment = $this->model->getComment($idComment);
        if ($comment) {
            $body = $this->getBody();
            $comment = $body->comment;
            $score = $body->score;
            $id_user = $body->id_user;
            $id_book = $body->id_book;
            $comment = $this->model->updateComment($idComment, $comment, $score, $id_user, $id_book);
            $this->view->response("El comentario id=$idComment se ha actualizado con éxito", 200);
        } else{ 
            $this->view->response("El comentario id=$idComment no se ha encontrado", 404);
        }
    }

}