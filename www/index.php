<?php

require_once('Config/Helpers.php');

$url = $_GET['url'] ?? '/';
$url = '/' . trim($url, '/');

$routes = require 'Config/Routes.php';

if(isset($routes[$url])){

    $controllerName = $routes[$url][0];
    $method = $routes[$url][1];

    require_once "Controller/$controllerName.php";

    $controller = new $controllerName();

    $controller->$method();

}else{

    echo "ROTA NÃO ENCONTRADA: " . $url;
}