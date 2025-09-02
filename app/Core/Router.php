<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function add($path, $controller, $method)
    {
        $this->routes[$path] = [$controller, $method];
    }

    public function dispatch($currentPath)
    {
        foreach ($this->routes as $route => [$controller, $method]) {
            // ubah {param} jadi regex
            $pattern = preg_replace("#{[a-zA-Z_]+}#", "([^/]+)", $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $currentPath, $matches)) {
                array_shift($matches); // buang full match
                (new $controller())->$method(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
