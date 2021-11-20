<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiComsController.php';
//require_once 'Controller/ApiUserController.php';

$router = new Router();

$router->addRoute('comentarios', 'GET', 'ApiComsController', 'getComments');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComsController', 'getComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComsController', 'deleteComment');
$router->addRoute('comentarios', 'POST', 'ApiComsController', 'addComment');
$router->addRoute('comentarios/:ID', 'PUT', 'ApiComsController', 'editComment');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);