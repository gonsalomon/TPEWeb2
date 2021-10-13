<?php
require_once './lib/smarty-3.1.39/libs/Smarty.class.php';

class CategoriaView
{
    private $smarty;
    //constructor
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }
    //tabla de categorias general
    function showCategorias($categorias, $listaCat)
    {
        $this->smarty->assign('titulo', 'Lista de categorias');
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('listaCat', $listaCat);
        //renderizo
        $this->smarty->display('templates/categorias.tpl');
    }
    //una categoria sola
    function showCategoria($categoria)
    {
        $this->smarty->assign('categorias', $categoria);
        $this->smarty->display('templates/categoriaTableBody.tpl');
    }
    //el home
    function showHomeLocation()
    {
        header("Location: " . BASE_URL . "home");
    }
}