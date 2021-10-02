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
    function showCategorias($categorias)
    {
        $this->smarty->assign('titulo', 'Lista de categorias');
        $this->smarty->assign('categorias', $categorias);
        //renderizo
        $this->smarty->display('templates/categorias.tpl');
    }
    //una categoria sola
    function showCategoria($categoria)
    {
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->display('templates/categoriaDetail.tpl');
    }
    //el home
    function showHomeLocation()
    {
        header("Location: " . BASE_URL . "home");
    }
}