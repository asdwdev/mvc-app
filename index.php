<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;

// ambil URL path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// daftar route
$routes = [
    "/" => [HomeController::class, "index"],
    "/users" => [UserController::class, "index"],
];

// cek apakah route ada
if (array_key_exists($path, $routes)) {
    [$controller, $method] = $routes[$path];
    (new $controller())->$method();
} else {
    http_response_code(404);
    echo "404 Not Found";
}
