<?php

class MuebleModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    //meto connect acá porque es donde mejor se contextualiza
    function connect()
    {
        return new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    function getMuebles()
    {
        $sentencia = $this->db->prepare("select * from mueble");
        $sentencia->execute();
        $muebles = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $muebles;
    }

    function getMueble($id) 
    {
        $sentencia = $this->db->prepare("SELECT * FROM mueble WHERE id_mueble=?");
        $sentencia->execute(array($id));
        $mueble = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $sentencia2 = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria=?");
        $sentencia2->execute(array($mueble[0]->id_categoria));
        $cat = $sentencia2->fetchAll(PDO::FETCH_OBJ);

        $mueble[0]->categoria = $cat[0]->nombre;

        return $mueble;
    }

    //subo un mueble a la BBDD
    function insertMueble($nombre, $descripcion, $precio, $categoria)
    {
        $sentencia = $this->db->prepare("INSERT INTO mueble(nombre, descripcion, precio, categoria) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($nombre, $descripcion, $precio, $categoria));
    }

    //modifico un mueble
    function updateMueble($nombre, $detalles, $precio, $id_mueble)
    {
        $sentencia = $this->db->prepare("UPDATE mueble SET nombre = ?, detalles = ?, precio = ? WHERE id_mueble=?");
        $sentencia->execute(array($id_mueble));
    }

    //borro un mueble
    function deleteMueble($id_mueble)
    {
        $sentencia = $this->db->prepare("DELETE FROM mueble WHERE id_mueble=?");
        $sentencia->execute(array($id_mueble));
    }
}
