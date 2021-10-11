<?php
//incluyo controller (no preciso entrar en view ni en model desde el route)
require_once "controller/MuebleController.php";
//constante global de la URL de mi web
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
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
//decide qué camino tomar con un switch
switch ($params[0]) {
    case 'home':
        $muebleController->getMueblesConCategoria();
        break;
        //ver otros CASEs y elaborar
    case 'ViewDetail':
        $muebleController->getMueble($params[1]);
        //el default te manda al home
    default:
        echo ('404: Page not found.'); //mejorar
        break;
}
