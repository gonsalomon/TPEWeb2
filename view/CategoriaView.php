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
        if (!isset($_SESSION["USERNAME"]))
        {
            session_start();
        }
        if (!empty($_SESSION["USERNAME"]))
        {
            $this->smarty->assign('titulo', 'Lista de categorías');
            $this->smarty->assign('admin',true);
            $this->smarty->assign('user',$_SESSION['USERNAME']);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('listaCat', $listaCat);
            $this->smarty->display('templates/categorias.tpl');
        }
        else
        {
            $this->smarty->assign('titulo', 'Lista de categorias');
            $this->smarty->assign('admin',false);
            $this->smarty->assign('user',$_SESSION['USERNAME']);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('listaCat', $listaCat);
            $this->smarty->display('templates/categorias.tpl'); 
        }
    }
    //una categoria sola
    function showCategoria($categoria){
        if (!isset($_SESSION["USERNAME"])){
            session_start();
        }
        $this->smarty->assign('titulo', 'Lista de categorías');
        if (!empty($_SESSION["USERNAME"])){            
            $this->smarty->assign('admin',true);
            $this->smarty->assign('user',$_SESSION['USERNAME']);            
        }else{
            $this->smarty->assign('admin',false);
        }
        $this->smarty->assign('categorias', $categoria);
        $this->smarty->display('templates/categoriaTableBody.tpl');
    }
    //el home
    function showHomeLocation()
    {
        header("Location: " . BASE_URL . "home");
    }
}