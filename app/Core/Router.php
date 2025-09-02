<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function add($method, $path, $controller, $action)
    {
        $method = strtoupper($method);
        $this->routes[$method][$path] = [$controller, $action];
    }

    public function dispatch($currentPath, $requestMethod)
    {
        $requestMethod = strtoupper($requestMethod);

        if (!isset($this->routes[$requestMethod])) {
            http_response_code(405);
            echo "405 Method Not Allowed";
            return;
        }

        foreach ($this->routes[$requestMethod] as $route => [$controller, $action]) {
            // ubah {param} jadi regex
            $pattern = preg_replace("#{[a-zA-Z_]+}#", "([^/]+)", $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $currentPath, $matches)) {
                array_shift($matches);
                (new $controller())->$action(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
