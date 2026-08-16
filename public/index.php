<?php

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/LandingController.php';

$router = new Router();

$router->get('/', [LandingController::class, "index"]);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);