<?php

class Controller
{
    protected string $route = '';

    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }

    protected function render(string $view, string $layout, array $data = []): void
    {
        extract($data);
        $currentRoute = $this->route;

        ob_start();
        require __DIR__ . "/../views/{$view}.php";
        $content = ob_get_clean();

        // Layouts put this on <main>; the view's page stylesheet is scoped under it
        // (e.g. landing/cart -> page-landing-cart) so it can't style other pages.
        $pageClass = 'page-' . str_replace(['/', '_'], '-', strtolower($view));

        require __DIR__ . "/../views/layouts/{$layout}.php";
    }
}
