<?php

class Controller
{
    protected string $route = '';

    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    protected function getBaseUrl(): string
    {
        $scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        return ($scriptDir === '/' || $scriptDir === '.') ? '' : $scriptDir;
    }

    protected function redirect(string $path): void
    {
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            header('Location: ' . $path);
        } else {
            $base = $this->getBaseUrl();
            header('Location: ' . $base . '/' . ltrim($path, '/'));
        }
        exit;
    }

    protected function render(string $view, string $layout, array $data = []): void
    {
        extract($data);
        $currentRoute = $this->route;

        ob_start();
        require __DIR__ . "/../views/{$view}.php";
        $content = ob_get_clean();

        require __DIR__ . "/../views/layouts/{$layout}.php";
    }

    protected function renderContent(string $content, string $layout, array $data = []): void
    {
        extract($data);
        $currentRoute = $this->route;

        require __DIR__ . "/../views/layouts/{$layout}.php";
    }
}
