<?php

class AuthModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    function addUser($user, $pass)
    {
        $sentencia = $this->db->prepare("INSERT INTO users(mail, pass, is_admin) VALUES(?, ?, ?)");
        $sentencia->execute(array($user, $pass, false));
        header("Location: home");
    }

    function getUser($user)
    {
        $sentencia = $this->db->prepare("SELECT * FROM users WHERE mail=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getUsers()
    {
        $sentencia = $this->db->prepare("SELECT * FROM users");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function delUser($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM users WHERE id=?");
        $sentencia->execute(array($id));
        echo "Usuario eliminado correctamente";
        header("Location: home");
    }
}
