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
    function getMueblesConCategorias()
    {
        $mueblesConCategorias = $this->model->getMueblesConCategorias();
        $listaCategorias = $this->model->getCategoriasList();
        $this->view->showCategorias($mueblesConCategorias, $listaCategorias);
    }

    function getCategoria($idCategoria)
    {
        $muebles = $this->model->getCategoria($idCategoria);
        $this->view->showCategoria($muebles);
    }

    function viewAllCats()
    {
        $cats = $this->model->getCategoriasList();
        $this->view->showCatsList($cats);
    }

    function addCategoria()
    {
        $this->model->addCategoria($_POST['categoria'], $_POST['descripcion']);
        header('Location:' . BASE_URL . 'viewAllCats');
    }

    function delCategoria($id)
    {
        $this->model->delCategoria($id);
        header('Location:' . BASE_URL . 'viewAllCats');
    }

    function editCategoria($id)
    {
        $this->model->editCategoria($_POST['categoria'], $_POST['descripcion'], $id);
        header('Location:' . BASE_URL . 'viewAllCats');
    }
}