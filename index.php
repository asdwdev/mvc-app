<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    "/" => [HomeController::class, "index"],
    "/users" => [UserController::class, "index"],
    "/users/{id}" => [UserController::class, "show"],
    // contoh lain:
    "/posts/{slug}" => [PostController::class, "detail"],
];

// cek semua route
foreach ($routes as $route => [$controller, $method]) {
    // ubah {param} jadi regex
    $pattern = preg_replace("#{[a-zA-Z_]+}#", "([^/]+)", $route);
    $pattern = "#^" . $pattern . "$#";

    if (preg_match($pattern, $path, $matches)) {
        array_shift($matches); // buang hasil full match
        (new $controller())->$method(...$matches);
        exit;
    }
}

// kalau gak ada yang cocok
http_response_code(404);
echo "404 Not Found";
