<?php
require_once 'libs/Router.php';

$router = new Router();

$router->addRoute('comments', 'GET', 'ApiCommentController', 'getComments');
$router->addRoute('comments', 'GET/:ID', 'ApiCommentController', 'getComment');
$router->addRoute('comments', 'POST', 'ApiCommentController', 'newComment');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
