<?php

class Router
{
    private array $routes = [];

    /**
     * $permission is optional. Routes that omit it stay open to anyone —
     * this keeps every pre-existing public route (landing, store, auth)
     * unaffected by the RBAC layer added later.
     */
    public function get(string $path, array $handler, string|array|null $permission = null): void
    {
        $this->routes['GET'][$path] = ['handler' => $handler, 'permission' => $permission];
    }

    public function post(string $path, array $handler, string|array|null $permission = null): void
    {
        $this->routes['POST'][$path] = ['handler' => $handler, 'permission' => $permission];
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $route = $this->routes[$method][$path] ?? null;

        if ($route === null) {
            (new ErrorController())->pageNotFoundError404();
            return;
        }

        $permission = $route['permission'];

        if ($permission !== null) {
            if (empty($_SESSION['user_id'])) {
                header('Location: /login');
                exit;
            }

            if ($permission === '@member') {
                if (!empty($_SESSION['is_staff'])) {
                    (new ErrorController())->accessDeniedError403();
                    return;
                }
            } elseif (is_array($permission)) {
                if (!Gate::any($permission)) {
                    (new ErrorController())->accessDeniedError403();
                    return;
                }
            } else {
                if (!Gate::allows($permission)) {
                    (new ErrorController())->accessDeniedError403();
                    return;
                }
            }
        }

        [$controllerClass, $action] = $route['handler'];
        $controller = new $controllerClass();
        $controller->setRoute($path);
        $controller->$action();
    }
}
