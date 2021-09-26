<?php

class MuebleModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    //$foo = getMuebles(); hace que en foo[0] tenga el 1er mueble, foo[1] el 2do, foo[2] el 3ro, etc...
    function getMuebles()
    {
        $sentencia = $this->db->prepare("select * from mueble");
        $sentencia->execute();
        $muebles = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $muebles;
    }

    //lo mismo que traer todos los muebles, pero traigo uno solo por id
    function getMueble($id_mueble)
    {
        $sentencia = $this->db->prepare("select * from mueble WHERE id_mueble=?");
        $sentencia->execute(array($id_mueble));
        $mueble = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $mueble;
    }

    //subo un mueble a la BBDD
    function insertMueble($nombre, $detalles, $precio)
    {
        $sentencia = $this->db->prepare("INSERT INTO mueble(nombre, detalles, precio) VALUES(?, ?, ?)");
        $sentencia->execute(array($nombre, $detalles, $precio));
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
