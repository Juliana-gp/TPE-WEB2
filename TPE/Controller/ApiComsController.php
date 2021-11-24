<?php

require_once "./Model/ComsModel.php";
require_once "./View/ApiView.php";
require_once "./Model/BooksModel.php";
require_once "./Model/UserModel.php";
require_once "./Helpers/AuthHelper.php";


class ApiComsController{

    private $model;
    private $view;
    private $userModel;
    private $booksModel;
    private $authHelper;


    function __construct(){
        $this->model = new ComsModel();
        $this->view = new ApiView();
        $this->userModel = new UserModel();
        $this->booksModel = new BooksModel();
        $this -> authHelper = new AuthHelper();

    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

    function getComments() {
        $filters = array(
            'book' => null,
            'score' => null,
            'user' => null, 
            'orderBy' => null,
            'ASC' => null
        );

        if (isset($_GET['book'])){
            $book = $this->booksModel->getItem($_GET['book']);
            if ($book)
                $filters['book'] = $_GET['book'];
            else
                return $this->view->response("El libro por el que quiere filtrar no existe", 400);
        }
        if (isset($_GET['user'])) {
            $user = $this->userModel->getUserById($_GET['user']);
            if ($user)
                $filters['user'] = $_GET['user']; 
            else
                return $this->view->response("El usuario por el que quiere filtrar no existe", 400);
        }
        if (isset($_GET['score'])){
            if (($_GET['score'])>=1 && (($_GET['score'])<=5 ))
                $filters['score'] = $_GET['score'];
            else
                return $this->view->response("Los valores indicados son erroneos", 400);
        }
        if (isset($_GET['orderby'])) {
            if ( ($_GET['orderby'] == "score") || ($_GET['orderby'] == "id_comment") )
                $filters['orderBy'] = $_GET['orderby'];
                if (isset($_GET['order'])) {
                    if ( ($_GET['order'] == "ASC") || ($_GET['order'] == "DESC") )
                        $filters['ASC'] = $_GET['order'];
                    else{
                        return $this->view->response("No seleccionó un criterio correcto", 400);
                    }
                }
            else{
                return $this->view->response("Los valores por los que quiere ordenar son erroneos", 400);
            }
        }
        
        $comentarios = $this->model->getComments($filters);
        if ($comentarios)
            return $this->view->response($comentarios, 200);
        else 
            return $this->view->response("No hay comentarios", 204);
    }

    function addComment($params = null) {
        $body = $this->getBody();
        if (isset($body->comment) && isset($body->score) && isset($body->id_user) && isset($body->id_book) ){
            $user = $this->userModel->getUserById($body->id_user);
            if ($user){
                $item = $this->booksModel->getItem ($body->id_book);
                if ($item){
                    $id = $this->model->addComment($body->comment, $body->score, $body->id_user, $body->id_book);

                    if ($id != 0)
                        return $this->view->response("Se ha agregado el comentario id=$id", 200);
                    else 
                        return $this->view->response("Hubo un error al guardar el comentario", 500);
                } else
                    return $this->view->response("No existe el libro que quiere comentar", 400);                         
            } else
                return $this->view->response("El usuario asociado al comentario no existe", 400);         
        } else
            return $this->view->response("Faltan completar campos", 400);
    }

    function deleteComment($params = null){
        $this->authHelper->checkAdmin();

        $idComment = $params[":ID"];
        $comment = $this->model->getComment($idComment);
        if ($comment) {
            $this->model->deleteComment($idComment);
            $commentD = $this->model->getComment($idComment);
            if ($commentD)
                return $this->view->response("Hubo un problema interno al borrar el comentario", 500);
            else
                return $this->view->response("El comentario fue borrado correctamente", 200);
        } else {
            return $this->view->response("El comentario que intenta borrar no existe", 404);
        }
    }


    //--------------------Estarian ok pero no las necesitamos --------------------//

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

    function getComment($params = null){
        $idComment = $params[":ID"];
        $comment = $this->model->getComment($idComment);
        if ($comment) {
            return $this->view->response($comment, 200); 
        } else {
            return $this->view->response("EL comentario con id $idComment no existe", 404);
        }
    }
}