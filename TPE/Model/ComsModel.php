<?php

class ComsModel{

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
        //echo($query);
        $sentence = $this->db->prepare($query);
        $sentence->execute();
        $comentarios = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    //updateComment es una consulta que ha quedado sin utilizar
    function updateComment($idComment, $comment, $score, $id_user, $id_book){
        $sentence = $this->db->prepare("UPDATE `comments` SET `comment`='$comment',`score`='$score', `id_user`='$id_user', `id_book`='$id_book' 
                                        WHERE `comments`.`id_comment`=?");
        $sentence->execute(array($idComment));
    }


    //getCommentUser actualmente se usa para saber si se puede borrar un usuario
    function getCommentUser($idUser){
        $sentence = $this->db->prepare("SELECT * FROM comments WHERE id_user=?");
        $sentence->execute(array($idUser));
        $comment = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }

    //getCommentBook actualmente se usa para saber si se puede borrar un libro
    function getCommentBook($idBook){
        $sentence = $this->db->prepare("SELECT * FROM comments WHERE id_book=?");
        $sentence->execute(array($idBook));
        $comment = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }
}
