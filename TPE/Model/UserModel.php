<?php

class UserModel{

    private $db;

    function __construct(){
        $this -> db = new PDO ('mysql:host=localhost;'.'dbname=db_books;charset=utf8', 'root', '');
    }

    function getUser($userName){
        $query = $this->db->prepare('SELECT * FROM users WHERE user=?');
        $query->execute([$userName]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getUserById($id){
        $query = $this->db->prepare('SELECT * FROM users WHERE id_user=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function deleteUser($id){
        $sentence = $this->db->prepare("DELETE FROM users WHERE id_user=?");
        $sentence->execute(array($id));
    }

    function addUser(){
        if (!empty($_POST['usuario']) && !empty($_POST['password']) ){
            $usuario = $_POST['usuario'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query = $this->db->prepare('INSERT INTO users (user, password, role) VALUES (?,?,?)');
            $query->execute([$usuario, $password, "user"]);
            return $this->db->lastInsertId();
        }
    }

    function updateUserRole($role, $idUser){
            $sentence = $this->db->prepare("UPDATE users SET role=? WHERE id_user=?");
            $sentence->execute(array($role, $idUser));
    }

    function getUsers(){
        $sentence = $this->db->prepare("SELECT id_user, user, role FROM users ORDER BY user ASC");
        $sentence->execute();
        $users = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $users; 
    }
}