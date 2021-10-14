<?php

class UserModel{

    private $db;

    function __construct(){
        $this -> db = new PDO ('mysql:host=localhost;'.'dbname=db_books;charset=utf8', 'root', '');
    }

    function getUser($user){
        $query = $this->db->prepare('SELECT * FROM users WHERE user = ?');
        $query->execute([$user]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addUser(){
        if (!empty($_POST['usuario']) && !empty($_POST['password']) ){
            $usuario = $_POST['usuario'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $query = $this->db->prepare('INSERT INTO users (user, password) VALUES (?,?)');
            $query->execute([$usuario, $password]);
        }
    }
}