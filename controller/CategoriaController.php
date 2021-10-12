<?php
require_once "./model/CategoriaModel.php";
require_once "./view/CategoriaView.php";

class CategoriaController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    //traigo todas las categorias
    function getCategorias($muebles)
    {
        $categorias = $this->model->getCategorias($muebles);
        $this->view->showCategorias($categorias);
    }

    function getCategoria($idCategoria)
    {
        $muebles = $this->model->getCategoria($idCategoria);
        $this->view->showCategoria($muebles);
        return $muebles;
    }
}