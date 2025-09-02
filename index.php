<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

// daftar route lebih simple
$router->get("/", HomeController::class, "index");
$router->get("/users", UserController::class, "index");
$router->get("/users/{id}", UserController::class, "show");
$router->post("/users", UserController::class, "store");

$router->dispatch($path, $method);
