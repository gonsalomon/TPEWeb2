<?php
require_once "controller/MuebleController.php";
require_once "controller/CategoriaController.php";
require_once "controller/UserController.php";
// require_once "API/CommentController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

$muebleController = new MuebleController();
$categoriaController = new CategoriaController();
$authController = new UserController();
// $cc = new CommentController();

switch ($params[0]) {
    case 'home':
    case 'admin':
        $muebleController->getMueblesConCategoria();
        break;
    case 'auth':
        $authController->auth();
        break;
    case 'ViewDetail':
        $muebleController->getMueble($params[1], null);
        // $cc->getComments(null);
        break;
    case 'editUsers':
        $authController->getAllUsers();
        break;
    case 'filter':
        $categoriaController->getCategoria($params[1]);
        break;
    case 'addMueble':
        $muebleController->addMueble();
        break;
    case 'editMueble':
        $muebleController->editMueble($params[1]);
        break;
    case 'delMueble':
        $muebleController->delMueble($params[1]);
        break;
    case 'delUser':
        $authController->delUser($params[1]);
        break;
    case 'toggleAdmin':
        $authController->toggleAdmin($params[1]);
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'viewAllCats':
        $categoriaController->viewAllCats();
        break;
    default:
        echo ('404: Page not found.');
        break;
}
