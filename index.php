<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

// daftar route dengan method
$router->add("GET", "/", HomeController::class, "index");
$router->add("GET", "/users", UserController::class, "index");
$router->add("GET", "/users/{id}", UserController::class, "show");
$router->add("POST", "/users", UserController::class, "store");

// jalankan router
$router->dispatch($path, $method);
