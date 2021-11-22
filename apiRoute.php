<?php
require_once 'lib/Router.php';
require_once 'API/CommentController.php';

$router = new Router();

$router->addRoute('comments', 'GET', 'CommentController', 'getComments');
$router->addRoute('comments/:ID', 'GET', 'CommentController', 'getComment');
$router->addRoute('test', 'GET', 'CommentController', 'test');
// $router->addRoute('comments', 'POST', 'CommentController', 'newComment');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
