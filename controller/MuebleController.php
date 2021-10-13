<?php
require_once "./model/MuebleModel.php";
require_once "./view/MuebleView.php";
require_once "./controller/CategoriaController.php";
require_once "./controller/AuthController.php";

class MuebleController
{
    private $model;
    private $view;

    private $categoriaController;

    private $auth;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new MuebleView();
        $this->categoriaController = new CategoriaController();
        $this->auth = new AuthController();
    }

    //traigo todos los muebles
    function getMuebles()
    {
        $muebles = $this->model->getMuebles();
        return $muebles;
    }

    function getMueble($id)
    {
        $mueble = $this->model->getMueble($id);
        $this->view->showMueble($mueble);
    }

    function getMueblesConCategoria() {
        $muebles = $this->getMuebles();
        $mueblesConDetalle = $this->categoriaController->getCategorias($muebles);
    }
}
