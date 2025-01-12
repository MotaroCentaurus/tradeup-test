<?php
declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);

        // Convert dynamic parameters to regex, e.g., "/users/{id}" -> "/users/(?<id>[^/]+)"
        $regexPath = preg_replace('/\{(\w+)\}/', '(?P<\1>[^/]+)', $path);

        $this->routes[] = [
            'path' => $regexPath,
            'method' => strtoupper($method),
            'controller' => $controller,
            'middlewares' => []
        ];
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }

    public function dispatch(string $path)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        foreach ($this->routes as $route) {
            // Match the route's regex pattern with the current path
            if (!preg_match("#^{$route['path']}$#", $path, $matches)) {
                continue;
            }

            if ($route['method'] !== $method) {
                continue;
            }

            [$class, $function] = $route['controller'];

            // Extract dynamic parameters (named capture groups)
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

            // Instantiate the controller and invoke the method with parameters
            $controllerInstance = new $class;
            call_user_func_array([$controllerInstance, $function], $params);

            return;
        }

        // If no route matches
        http_response_code(404);
        echo "404 Not Found";
    }
}
