<?php
require_once './lib/smarty-3.1.39/libs/Smarty.class.php';

class MuebleView
{
    private $smarty;
    //constructor
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL',BASE_URL);
    }
    //tabla de muebles general
    function showMuebles($muebles)
    {
        $this->smarty->assign('titulo', 'Lista de muebles');
        $this->smarty->assign('muebles', $muebles);
        //renderizo
        $this->smarty->display('templates/muebles.tpl');
    }
    //tabla de muebles appending categoría, el append se hace en
    function showMueblesCategoria($muebles)
    {
        $this->smarty->assign('titulo', 'Lista de muebles');
        $this->smarty->assign('muebles', $muebles);
        //renderizo
        $this->smarty->display('templates/muebles.tpl');
    }
    //un mueble solo
    function showMueble($mueble)
    {
        $this->smarty->assign('titulo', $mueble[0]->nombre);
        $this->smarty->assign('mueble', $mueble);
        if (!empty($_SESSION["USERNAME"])){
            $this->smarty->assign('user', $_SESSION["USERNAME"]);
            $this->smarty->assign('admin',true);
        }else{
            $this->smarty->assign('admin',false);
        }
        $this->smarty->display('templates/muebleDetail.tpl');
    }
    //el home
    function showHomeLocation()
    {
        header("Location: " . BASE_URL . "home");
    }
}
