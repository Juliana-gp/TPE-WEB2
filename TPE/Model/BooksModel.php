<?php

class BooksModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_books;charset=utf8', 'root', '');
    }

    function delete($id){
        $sentence = $this->db->prepare("DELETE FROM `books` WHERE Book_id=?");
        $sentence->execute(array($id));
    }

    function insert($title, $author, $ISBN, $genre, $cover, $synopsis){
        $sentence = $this->db->prepare("INSERT INTO `books`(`Title`, `Author`, `ISBN`, 
                                        `Genre_id`, `Cover`, `Synopsis` ) 
                                        VALUES (?, ?, ?, ?, ?, ?)");
        $sentence->execute(array($title, $author, $ISBN, $genre, $cover, $synopsis));
    }

    function getAll(){
        $sentence = $this->db->prepare("SELECT Book_id, Title, Author, ISBN, Cover, Genre_id FROM `books`
        ORDER BY Title ASC");
        $sentence->execute();
        $books = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    
    function getItem($id){
        $sentence = $this->db->prepare("SELECT * FROM `books` WHERE Book_id=?");
        $sentence->execute(array($id));
        $item = $sentence->fetch(PDO::FETCH_OBJ);
        return $item;
    }

    function getByGenre($id){
        $sentence = $this->db->prepare("SELECT * FROM books WHERE Genre_id=? ORDER BY Title ASC");
        $sentence->execute(array($id));
        $items = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }

    function update($id, $title, $author, $ISBN, $genre, $synopsis, $cover = "") {
        $query = "UPDATE `books` SET `Title`='$title',`Author`='$author',`ISBN`='$ISBN', `Genre_id`='$genre', `Synopsis`='$synopsis' ";
        $query .= $cover != "" ? ",`Cover`='$cover' " : "";  
        $query .= "WHERE `books`.`Book_id`=?";
        $sentence = $this->db->prepare($query);
        $sentence->execute(array($id));
    }

}
