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
    case 'admin':
        $muebleController->getMueblesConCategoria();
        break;
    case 'auth':
        $authController->auth();
        break;
    case 'ViewDetail':
        $muebleController->getMueble($params[1]);
        break;
    case 'filter':
        $categoriaController->getCategoria($params[1]);
        break;
    case 'addMueble':
        $muebleController->addMueble($params[1]);
        break;
    case 'editMueble':
        $muebleController->editMueble($params[1]);
        break;
    case 'delMueble':
        $muebleController->delMueble($params[1]);
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        echo ('404: Page not found.');
        break;
}
