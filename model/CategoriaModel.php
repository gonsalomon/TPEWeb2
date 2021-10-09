<?php

class CategoriaModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    function getCategorias($muebles)
    {
        $sentencia = $db->prepare("SELECT * FROM categoria WHERE id_categoria=?");
        $mueblesConDetalle = array();
        foreach($muebles as $mueble) {
            $p['mueble'] = $mueble->nombre;
            $p['descripcion'] = $mueble->descripcion;
            $p['precio'] = $mueble->precio;
            
            $sentencia->execute(array($mueble->id_categoria));
            $categoria = $sentencia->fetch(PDO::FETCH_OBJ);
            $p['categoria']= $categoria->nombre;

            array_push($mueblesConDetalle, $p);
        }
        return $mueblesConDetalle;
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