<?php

class CommentModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    function getComments()
    {
        $sentencia = $this->db->prepare("SELECT * FROM comments");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComment($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id=?");
        $sentencia->execute(array($id));
        $comment = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comment;
    }
}
