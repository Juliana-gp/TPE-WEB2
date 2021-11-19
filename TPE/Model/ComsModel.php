<?php
class ComsModel{

    //id_comment
    //          comment, score, id_user, id_book

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_books;charset=utf8', 'root', '');
    }

    function getComments(){
        $sentence = $this->db->prepare("SELECT * FROM comments");
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
}
