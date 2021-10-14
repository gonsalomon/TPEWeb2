<?php

require_once "controller/MuebleController.php";
require_once "controller/CategoriaController.php";
require_once "controller/AuthController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

$muebleController = new MuebleController();
$categoriaController = new CategoriaController();
$authController = new AuthController();

switch ($params[0]) {
    case 'home':
        $muebleController->getMueblesConCategoria();
        //acá iría la línea que carga todas las categorías
        break;
    case 'login':
        // $muebleController->getMueblesConCategoria();
        $authController->verificarLogin();
        //$authController->login();
        // if($authController->checkLoggedIn())
            //sudoGetMueblesConCategoria
        break;
    case 'register':
        $authController->register();
        break;
    case 'admin':
        //acá va el tpl empowered con permisos de admin (el sudoGetMueblesConCategoría)
        break;
    //falta agregar casos, son 3 tablas: todas las categorías (sin muebles), todos los muebles de todas las categorías (ya está), todos los muebles de una categoría (ya está), ViewDetail
    //acá nos falta la primera, el filter resuelve la 2da y la 3ra (puede mostrar todos los muebles en la bbdd)
    case 'ViewDetail':
        $muebleController->getMueble($params[1]);
        break;
    case 'filter':
        $categoriaController->getCategoria($params[1]);
        break;
    default:
        echo ('404: Page not found.');
        break;
}
