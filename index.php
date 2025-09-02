<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router = new Router();

// daftar route
$router->add("/", HomeController::class, "index");
$router->add("/users", UserController::class, "index");
$router->add("/users/{id}", UserController::class, "show");

// jalankan router
$router->dispatch($path);
