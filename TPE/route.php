<?php
//incluyo controller (no preciso entrar en view ni en model desde el route)
require_once "controller/MuebleController.php";
//constante global de la URL de mi web, y del home
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('home', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/getMuebles');
//lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}
//parseo el action[]
$params = explode('/', $action);
//instancio el controller
$muebleController = new MuebleController();
//decido qué camino tomar con un switch
switch ($params[0]) {
    //tanto home como getMuebles te mandan a mostrar la tabla de todos los muebles (debería ser así? o home te tendría que mandar a la de las categorías?)
    case 'home':
        $muebleController->getCategorias();
        break;
    case 'getMuebles':
        $muebleController->getMuebles();
        break;
    //ver otros CASEs y elaborar
    
    //el default te manda al home
    default:
        echo ('404: Page not found.'); //mejorar
        break;
}
