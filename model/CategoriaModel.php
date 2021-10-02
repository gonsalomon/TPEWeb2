<?php

class CategoriaModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    function getCategorias()
    {
        $sentencia = $this->db->prepare("select * from categoria");
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function insertCategoria($nombre, $descripcion)
    {
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES(?, ?)");
        $sentencia->execute(array($nombre, $descripcion));
    }

    function updateCategoria($nombre, $descripcion, $id_categoria)
    {
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre = ?, descripcion = ? WHERE id_categoria=?");
        $sentencia->execute(array($id_categoria));
    }

    function deleteCategoria($id_categoria)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id_categoria));
    }
}