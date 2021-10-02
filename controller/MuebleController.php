<?php
require_once "./model/MuebleModel.php";
require_once "./view/MuebleView.php";

class MuebleController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new MuebleView();
    }

    //traigo todos los muebles
    function getMuebles()
    {
        $muebles = $this->model->getMuebles();
        return $muebles;
    }

    //necesito romper ligeramente el MVC para hacer cosas de base de datos en un controller (por la relación entre tablas) hasta que pueda
    function getMueblesConCategoria() {
        $muebles = $this->getMuebles();
        $db = $this->model->connect();
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

        $this->view->showMueblesCategoria($mueblesConDetalle);
    }
}
