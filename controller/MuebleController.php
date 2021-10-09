<?php
require_once "./model/MuebleModel.php";
require_once "./view/MuebleView.php";
require_once "./controller/CategoriaController.php";

class MuebleController
{
    private $model;
    private $view;

    private $categoriaController;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new MuebleView();
        $this->categoriaController = new CategoriaController();
    }

    //traigo todos los muebles
    function getMuebles()
    {
        $muebles = $this->model->getMuebles();
        return $muebles;
    }

    //WIP llevando a MVC este método
    function getMueblesConCategoria() {
        $muebles = $this->getMuebles();
        $mueblesConDetalle = $this->categoriaController->getCategorias($muebles);
        $this->view->showMueblesCategoria($mueblesConDetalle);
    }
}
