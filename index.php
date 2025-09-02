<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

// route biasa
$router->get("/", HomeController::class, "index");

// 🚀 resource route
$router->resource("/users", UserController::class);

$router->dispatch($path, $method);
