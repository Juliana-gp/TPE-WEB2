<?php
require_once "./View/ApiView.php";
require_once "./Model/BooksModel.php";

class ApiBooksController{

    private $view;
    private $model;



    function __construct(){
        $this -> view = new ApiView();
        $this -> model = new BooksModel();
    }


    function getBooks(){
        $books = $this->model->getAll();
        if ($books){
            return $this->view->response($books, 200);
        }
        else
            return $this->view->response("No hay libros disponibles para mostrar", 204);
    }

        
    function getBook($params = null){
        $id = $params [":ID"];
        $item = $this->model->getItem($id);
        return $item ? $this->view->response($item, 200) : $this->view->response("Error en el ID: $id solicitado", 404);
    }



    function add($params = null) {
        $body = $this->getBody();

        $name = $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], 'images/covers/'.$name );
        $id =  $this->model->insert($_POST['title'], $_POST['author'], $_POST['ISBN'], $_POST['genre'], $name, $_POST['synopsis']);
        if ($id != 0) {
            $this->view->response("El libro se insertó con el id=$id", 200);
        } else {
            $this->view->response("El libro no se pudo insertar", 500);
        }
    }

    function delete($params = null){
        $id = $params [":ID"];
        $item = $this->model->getItem($id);
        if ($item){
            $this->model->delete($id);
            return $this->view->response("El libro con el id= $id fue borrada", 200);
        }
        else{
            return $this->view->response("El libro con el id= $id no existe", 404);
        }
    }


    function update($params = null){
        $id = $params [":ID"];
        $body = $this->getBody();

        $item = $this->model->getItem($id);
        if ($item){
            if (isset($body['title'], $body['author'], $body['ISBN'],$body['genre'], $body['synopsis'])) {  
                $name = $_FILES['cover']['name'];
                if ($name && $name != "") {
                    move_uploaded_file($_FILES['cover']['tmp_name'], 'images/covers/'.$name );
                }   
                $this->model->update($id, $body->title, $body->author, $body->ISBN, $body->genre, $body->synopsis, $name);
                $this->view->response("El libro se actualizó correctamente", 200);
            } else {
                return $this->view->response("No se puede modificar el libro, faltan datos", 404);
            }
        }
        else
            return $this->view->response("El libro que se quiere modificar no existe", 404);
    }

    /**
     * Devuelve el body del request
     */
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

}