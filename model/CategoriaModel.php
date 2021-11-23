<?php

class CategoriaModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    // function getCategorias($muebles)
    // {
    //     $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria=?");
    //     $mueblesConDetalle = array();
    //     foreach($muebles as $mueble) {
    //         $p['mueble'] = $mueble->nombre;
    //         $p['descripcion'] = $mueble->descripcion;
    //         $p['precio'] = $mueble->precio;
            
    //         $sentencia->execute(array($mueble->id_categoria));
    //         $categoria = $sentencia->fetch(PDO::FETCH_OBJ);
    //         $p['categoria']= $categoria->nombre;
    //         $p['id_mueble'] = $mueble->id_mueble;

    //         array_push($mueblesConDetalle, $p);
    //     }
    //     return $mueblesConDetalle;
    // }

    function getMueblesConCategorias()
    {
        $sentencia = $this->db->prepare("SELECT categoria.nombre AS nombre_categoria, mueble.id_mueble, mueble.nombre, mueble.descripcion, mueble.precio
                                        FROM mueble INNER JOIN categoria 
                                        ON mueble.id_categoria = categoria.id_categoria");
        $sentencia->execute(array());
        $arr = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }

    function getCategoria($idCategoria)
    {
        if ($idCategoria == 0)
        {
            return $this->getMueblesConCategorias();
        }

        $sentencia = $this->db->prepare("SELECT categoria.nombre AS nombre_categoria, mueble.id_mueble, mueble.nombre, mueble.descripcion, mueble.precio
                                        FROM mueble INNER JOIN categoria 
                                        ON mueble.id_categoria = categoria.id_categoria 
                                        WHERE mueble.id_categoria=?");
        $sentencia->execute(array($idCategoria));
        $arr = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }

    // function getCategoria($idCategoria)
    // {
    //     $sentencia = $this->db->prepare("SELECT * FROM mueble WHERE id_categoria=?");
    //     $sentencia->execute(array($idCategoria));
    //     $mueblesFiltrados = $sentencia->fetchAll(PDO::FETCH_OBJ);

    //     $asd = $this->getMueblesConCategorias();
        
    //     return $asd;
    // }

    function getCategoriasList()
    {
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function addCategoria($nombre, $descripcion)
    {
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES(?, ?)");
        $sentencia->execute(array($nombre, $descripcion));
    }

    function editCategoria($nombre, $descripcion, $id_categoria)
    {
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre = ?, descripcion = ? WHERE id_categoria=?");
        $sentencia->execute(array($nombre, $descripcion, $id_categoria));
    }

    function delCategoria($id_categoria)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id_categoria));
    }
}