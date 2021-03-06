<?php
require_once './lib/smarty-3.1.39/libs/Smarty.class.php';

class CategoriaView
{
    private $smarty;
    //constructor
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
    }
    //tabla de categorias general
    function showCategorias($categorias, $listaCat)
    {
        if (!isset($_SESSION["USERNAME"])) {
            session_start();
        }
        if (!empty($_SESSION["USERNAME"])) {
            $this->smarty->assign('titulo', 'Lista de categorías');
            $this->smarty->assign('admin', $_SESSION["ADMIN"]);
            $this->smarty->assign('user', $_SESSION['USERNAME']);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('listaCat', $listaCat);
            $this->smarty->display('templates/home.tpl');
        } else {
            $this->smarty->assign('titulo', 'Lista de categorias');
            $this->smarty->assign('admin', false);
            $this->smarty->assign('user', false);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('listaCat', $listaCat);
            $this->smarty->display('templates/home.tpl');
        }
    }
    //una categoria sola
    function showCategoria($categoria)
    {
        if (!isset($_SESSION["USERNAME"])) {
            session_start();
        }
        if (!empty($_SESSION["USERNAME"])) {
            $this->smarty->assign('titulo', 'Lista de categorías');
            $this->smarty->assign('admin', $_SESSION["ADMIN"]);
            $this->smarty->assign('user', $_SESSION['USERNAME']);
            $this->smarty->assign('categorias', $categoria);
            $this->smarty->display('templates/categoriaTableBody.tpl');
        } else {
            $this->smarty->assign('titulo', 'Lista de categorias');
            $this->smarty->assign('admin', false);
            $this->smarty->assign('user', false);
            $this->smarty->assign('categorias', $categoria);
            $this->smarty->display('templates/categoriaTableBody.tpl');
        }
    }
    //el home
    function showHomeLocation()
    {
        header("Location: " . BASE_URL . "home");
    }

    function showCatsList($cats)
    {
        if (!isset($_SESSION["USERNAME"])) {
            session_start();
        }
        if (!empty($_SESSION["USERNAME"])) {
            $this->smarty->assign('titulo', 'Lista de categorías');
            $this->smarty->assign('admin', $_SESSION["ADMIN"]);
            $this->smarty->assign('user', $_SESSION['USERNAME']);
            $this->smarty->assign('cats', $cats);
            $this->smarty->display('templates/categoriaAllCats.tpl');
        } else {
            $this->smarty->assign('titulo', 'Lista de categorias');
            $this->smarty->assign('admin', false);
            $this->smarty->assign('user', false);
            $this->smarty->assign('cats', $cats);
            $this->smarty->display('templates/categoriaAllCats.tpl');
        }
    }
}
