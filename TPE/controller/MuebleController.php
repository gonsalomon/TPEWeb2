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
        $this->view->showMuebles($muebles);
    }

    //traigo tabla de categorías
    function getCategorias()
    {
        $categorias = $this->model->getCategorias();
        $this->view->showCategorias($categorias);
    }
}
