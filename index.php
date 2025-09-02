<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

// contoh routes CRUD user
$router->get("/", HomeController::class, "index");
$router->get("/users", UserController::class, "index");   // list
$router->get("/users/{id}", UserController::class, "show"); // detail
$router->post("/users", UserController::class, "store"); // create
$router->put("/users/{id}", UserController::class, "update"); // update
$router->delete("/users/{id}", UserController::class, "destroy"); // delete

$router->dispatch($path, $method);
