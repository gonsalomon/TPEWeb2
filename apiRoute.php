<?php
require_once './lib/Router.php';
require_once './api/CommentController.php';

$router = new Router();


$router->addRoute('comments/:ID', 'GET', 'CommentController', 'getComments');
$router->addRoute('comments', 'GET', 'CommentController', 'getComments');
$router->addRoute('comments/:ID', 'GET', 'CommentController', 'getComment');
$router->addRoute('comments', 'POST', 'CommentController', 'addComment');
$router->addRoute('comments/:ID', 'PUT', 'CommentController', 'editComment');
$router->addRoute('comments/:ID', "DELETE", 'CommentController', 'delComment');
// $router->addRoute('comments', 'POST', 'CommentController', 'newComment');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
