<?php

class ComsModel{

    //id_comment
    //          comment, score, id_user, id_book

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_books;charset=utf8', 'root', '');
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


    //getCommentUser actualmente se usa para saber si
    // se puede borrar un usuario, no supe utilizar el filtro que hiciste
    function getCommentUser($idUser){
        $sentence = $this->db->prepare("SELECT * FROM comments WHERE id_user=?");
        $sentence->execute(array($idUser));
        $comment = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }

    /**
     * $filterName: nombre del parametro en la api rest
     * $filterField: nombre del campo en la base de datos
     */
    // private function buildQueryFilter($params, $where, $filterName, $filterField) {
    //     if (isset($params[$filterName]) && $params[$filterName] != null) {
    //         if ($where == '') {
    //             $where .= " {$filterField} =  " . $params[$filterName]; 
    //         } else {
    //             $where .= " and {$filterField} =  " . $params[$filterName];
    //         }      
    //     }
    //     return $where;
    // }

    //SELECT comments.*, users.user FROM comments 
    //JOIN users ON comments.id_user=users.id_user 
    //AND comments.score=5 
    //AND comments.id_user=10 
    //ORDER BY comments.id_comment ASC

    //Modifico para filtrar por libro, por usuario y por ambas
    function getComments($params = null){
        $query = "SELECT comments.*, users.user FROM comments 
                  JOIN users ON comments.id_user=users.id_user ";
        if($params['book'])
                $query .= " AND comments.id_book=" . $params['book'] ;
        if($params['score'])
                $query .= " AND comments.score=" . $params['score'] ;
        if($params['user'])
                $query .= " AND comments.id_user=" . $params['user'] ;
        if($params['orderBy'])
                $query .= " ORDER BY comments." . $params['orderBy'] ;
        if($params['ASC'])
                $query .= " ".$params['ASC'] ;
        
        $sentence = $this->db->prepare($query);
        $sentence->execute();
        $comentarios = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    

    function getCommentsOrd($columna = null, $order = null){
        $query = "SELECT * from comments";
        $query .= $columna != null ? " ORDER BY '$columna' '$order'":"";  
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
