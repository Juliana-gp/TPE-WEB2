<?php

class GenresModel{

    private $db;

    function __construct(){
        $this -> db = new PDO ('mysql:host=localhost;'.'dbname=db_books;charset=utf8', 'root', '');
    }

    function delete($id){
        $sentence = $this->db->prepare("DELETE FROM `genres` WHERE Genre_id=?");
        $sentence->execute(array($id));
    }

    function insert($genre, $description){
        if(($_POST['genre'][0] >='A') && ($_POST['genre'][0] <='Z')) $img = $_POST['genre'][0].".png";
        else $img = "otro.png";
        $sentence = $this->db->prepare("INSERT INTO `genres`(`Genre`, `Description` , `Img`) VALUES (? , ? , ?)");
        $sentence->execute(array($genre, $description,$img));
    }

    function getAll(){
        $sentence = $this->db->prepare( "SELECT * FROM `genres`");
        $sentence->execute();
        $genres = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }

    function getItem($id){
        $sentence = $this->db->prepare("SELECT * FROM `genres` WHERE Genre_id=?");
        $sentence->execute(array($id));
        $item = $sentence->fetch(PDO::FETCH_OBJ);
        return $item;
    }
    
    function getNameAndId(){
        $sentence = $this->db->prepare( "SELECT `Genre_id`, `Genre` FROM `genres`");
        $sentence->execute();
        $nameAndId = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $nameAndId;
    }


    function getName($id){
        $sentence = $this->db->prepare( "SELECT`Genre` FROM `genres`WHERE Genre_id=?");
        $sentence->execute(array($id));
        $nameAndId = $sentence->fetch(PDO::FETCH_OBJ);
        return $nameAndId;
    }

    function update($id, $genre, $description){
        if(($_POST['genre'][0] >='A') && ($_POST['genre'][0] <='Z')) $img = $_POST['genre'][0].".png";
        else $img = "otro.png";
        $sentence = $this->db->prepare("UPDATE `genres` SET `Genre`='$genre',`Description`='$description', `Img`='$img'
                                        WHERE `genres`.`Genre_id`=?");
        $sentence->execute(array($id));
    }
    
}