<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Config\DatabaseConfig;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Router;
use App\Controllers\UserController;

$router = new Router();
$db = DatabaseConfig::getConnection(); 
$router->add('GET', '/', new HomeController($db), 'loadHome');
$router->add('GET', '/products', new ProductController($db), 'loadProductPage');
$router->add('GET', '/api/products/get', new ProductController($db), 'getAllProduct');
$router->add('GET', '/api/user-details/{id}', new UserController($db), 'getUser');
$router->add('POST', '/api/sign-up', new UserController($db), 'registerUser');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


$router->dispatch($method, $uri);
