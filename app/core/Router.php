<?php

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler, ?string $permission = null): void
    {
        $this->routes['GET'][$path] = ['handler' => $handler, 'permission' => $permission];
    }

    public function post(string $path, array $handler, ?string $permission = null): void
    {
        $this->routes['POST'][$path] = ['handler' => $handler, 'permission' => $permission];
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $route = $this->routes[$method][$path] ?? null;

        if ($route === null) {
            http_response_code(404);
            echo '404 - Page not found';
            return;
        }

        if ($route['permission'] !== null && !Gate::allows($route['permission'])) {
            http_response_code(403);
            echo '403 - Forbidden';
            return;
        }

        [$controllerClass, $action] = $route['handler'];
        $controller = new $controllerClass();
        $controller->setRoute($path);
        $controller->$action();
    }
}
