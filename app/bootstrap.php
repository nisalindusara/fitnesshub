<?php

session_start();

require_once __DIR__ . '/core/Autoloader.php';

Autoloader::register([
    __DIR__ . '/core',
    __DIR__ . '/controllers',
    __DIR__ . '/models',
    __DIR__ . '/services',
]);
