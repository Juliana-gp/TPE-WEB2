<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiComsController.php';

$router = new Router();

$router->addRoute('comentarios', 'GET', 'ApiComsController', 'getComments'); // book?id_book
$router->addRoute('comentarios', 'POST', 'ApiComsController', 'addComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComsController', 'deleteComment');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComsController', 'getComment');



$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);