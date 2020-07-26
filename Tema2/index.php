<?php
require 'DatabaseConnection.php';
require 'QueryBuilder.php';
require 'routes.php';
require 'Router.php';
require "controllers" . DIRECTORY_SEPARATOR . "Controller.php";
require "models" . DIRECTORY_SEPARATOR . "Book.php";
require "models" . DIRECTORY_SEPARATOR . "Author.php";
require "models" . DIRECTORY_SEPARATOR . "Publisher.php";


$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
$uri = explode('/', $uri);
$uri = end($uri);

$router = new Router();
$router->define($routes);
try {
    $router->direct($uri);
} catch(Exception $exception) {
    echo "Error";
}
