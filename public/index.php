<?php
require __DIR__ . '/../vendor/autoload.php';
require "../helpers.php";
// require basePath("Framework/Router.php");
// require basePath('Framework/Database.php');

use Framework\Router;

// spl_autoload_register(function ($class) {
//     $path = basePath('Framework/' . $class . '.php');
//     if (file_exists($path)) {
//         require $path;
//     }
// });

//instanciate the router
$router = new Router();
//Get routes
$routes = require basePath('routes.php');
//Get the current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
//route the request
$router->route($uri, $method);
