<?php

session_start();


const BaseBase = __DIR__ . '/../';

require BaseBase."Core/functions.php";

spl_autoload_register(function($class)
{
    $class=str_replace('\\','/',$class);
    require base_path("{$class}.php");
    
});
$router =new \Core\Router();
require base_path('bootsrap.php');



require base_path('routes.php');

// dd($router->readRoutes());

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// routeToPage($uri, $routes);

$method=$_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

// dd("the uri is {$uri}</br>the method is {$method}");

$router->rout($uri,$method);

