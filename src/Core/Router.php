<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    private array $routes = [];

    public function add(string $method, string $path, callable $handler): void
    {
        $this->routes[strtoupper($method)][trim($path)] = $handler;
    }

    public function dispatch(string $method, string $path): void
    {
        $method = strtoupper($method);
        $path = trim($path);

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            echo 'Halaman tidak ditemukan';
            return;
        }

        call_user_func($this->routes[$method][$path]);
    }
}
