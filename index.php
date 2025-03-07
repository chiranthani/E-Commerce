<?php

require __DIR__ . '/vendor/autoload.php';

use App\Config\DatabaseConfig;
use App\Controllers\ProductController;
use App\Router;
use App\Controllers\UserController;

$router = new Router();
$db = DatabaseConfig::getConnection(); 

$router->add('GET', '/product/get', new ProductController($db), 'getAllProduct');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$router->dispatch($method, $uri);
