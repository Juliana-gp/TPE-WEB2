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
            $query = $this->db->prepare('INSERT INTO users (user, password, rol) VALUES (?,?,?)');
            $query->execute([$usuario, $password, "user"]);
        }
    }

    function updateUserRole($role, $idUser){
            $sentence = $this->db->prepare("UPDATE users SET rol=? WHERE id_user=?");
            $sentence->execute(array($role, $idUser));
    }

    function getUsers(){
        $sentence = $this->db->prepare("SELECT id_user, user, rol FROM users ORDER BY user ASC");
        $sentence->execute();
        $users = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $users; 
    }

    function deleteUser($id){
        $sentence = $this->db->prepare("DELETE FROM users WHERE id_user=?");
        $sentence->execute(array($id));
    }

}