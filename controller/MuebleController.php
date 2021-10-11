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

    function getMueble($id)
    {
        $mueble = $this->model->getMueble($id);
        $this->view->showMueble($mueble);
    }

    //WIP llevando a MVC este método
    function getMueblesConCategoria() {
        $muebles = $this->getMuebles();
        $mueblesConDetalle = $this->categoriaController->getCategorias($muebles);
        // $this->view->showMueblesCategoria($mueblesConDetalle); //esta linea no va, esta repetida en otro lado y se llama a un show() dos veces
    }
}
