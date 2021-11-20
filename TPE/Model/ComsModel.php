<?php
class ComsModel{

    //id_comment
    //          comment, score, id_user, id_book

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_books;charset=utf8', 'root', '');
    }
    /**
     * $filterName: nombre del parametro en la api rest
     * $filterField: nombre del campo en la base de datos
     */
    private function buildQueryFilter($params, $where, $filterName, $filterField) {
        if (isset($params[$filterName]) && $params[$filterName] != null) {
            if ($where == '') {
                $where .= " {$filterField} =  " . $params[$filterName]; 
            } else {
                $where .= " and {$filterField} =  " . $params[$filterName];
            }      
        }
        return $where;
    }

    //Modifico para filtrar por libro, por usuario y por ambas
    function getComments($params){
        $query = "SELECT * FROM comments ";
        if (count($params)) {
            $filters = $this->buildQueryFilter($params, "", 'user', 'id_user');
            $filters = $this->buildQueryFilter($params, $filters, 'book', 'id_book');
            if ($filters != '') {
                $query = $query . " where " . $filters;
            }       
        }
        echo $query;
        $sentence = $this->db->prepare($query);
        $sentence->execute();
        $comentarios = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function addComment($texto, $puntaje, $usuario, $item){
        $sentence = $this->db->prepare("INSERT INTO comments(comment, score, id_user, id_book) VALUES(?, ?, ?, ?)");
        $sentence->execute(array($texto, $puntaje, $usuario, $item));
        return $this->db->lastInsertId();
    }

    function getComment($id){
        $sentence = $this->db->prepare("SELECT * FROM comments WHERE id_comment=?");
        $sentence->execute(array($id));
        $comment = $sentence->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    function deleteComment($id){
        $sentence = $this->db->prepare("DELETE FROM comments WHERE id_comment=?");
        return $sentence->execute(array($id));
    }

    function getCommentsOrd($columna = null, $order = null){
        $query = "SELECT * from comments";
        $query .= $columna != "" ? " ORDER BY '$columna' '$order'":"";  
        $sentence = $this->db->prepare($query);
        $sentence->execute();
        $comentarios = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    //---------------------------------------
    function updateComment($idComment, $comment, $score, $id_user, $id_book){
        $sentence = $this->db->prepare("UPDATE `comments` SET `comment`='$comment',`score`='$score', `id_user`='$id_user', `id_book`='$id_book' 
                                        WHERE `comments`.`id_comment`=?");
        $sentence->execute(array($idComment));
    }

}
