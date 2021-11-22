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
        $sentencia = $this->db->prepare("SELECT * FROM categorias");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComment($idCategoria)
    {
        $sentencia = $this->db->prepare("SELECT * FROM mueble WHERE id_categoria=?");
        $sentencia->execute(array($idCategoria));
        $comment = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $asd = $this->getComments($comment);

        return $asd;
    }
}
