<?php

// Classes and their scheduled sessions
$router->get('/portal/classes', [ClassDemoController::class, 'index'], 'manage_classes');
$router->get('/portal/classes/create', [ClassDemoController::class, 'create'], 'manage_classes');
$router->get('/portal/classes/show', [ClassDemoController::class, 'show'], 'manage_classes');
$router->get('/portal/classes/sessions', [ClassDemoController::class, 'sessions'], 'manage_classes');
$router->get('/portal/classes/sessions/create', [ClassDemoController::class, 'createSession'], 'manage_classes');
$router->get('/portal/classes/sessions/show', [ClassDemoController::class, 'showSession'], 'manage_classes');

// Personal training bookings
$router->get('/portal/personal-training', [PersonalTrainingController::class, 'showPersonalTrainingScreen'], 'manage_personal_training');
