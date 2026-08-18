<?php

class Controller
{
    protected string $route = '';

    public function setRoute(string $route) : void 
    {
        $this->route = $route;
    }

    protected function render(string $view, string $layout, array $data = []) : void
    {
        extract($data);
        $currentRoute = $this->route;

        ob_start();
        require __DIR__ . "/../views/{$view}.php";
        $content = ob_get_clean();

        require __DIR__ . "/../views/layouts/{$layout}.php";
    }
}
