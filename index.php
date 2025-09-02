<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// daftar route
$routes = [
    "/" => [HomeController::class, "index"],
    "/users" => [UserController::class, "index"],
];

// cek static routes dulu
if (array_key_exists($path, $routes)) {
    [$controller, $method] = $routes[$path];
    (new $controller())->$method();
    exit;
}

// cek dynamic route: /users/{id}
if (preg_match("#^/users/(\d+)$#", $path, $matches)) {
    $id = $matches[1]; // tangkap angka dari URL
    $controller = new UserController();
    $controller->show($id);
    exit;
}

// kalau gak ada, 404
http_response_code(404);
echo "404 Not Found";
