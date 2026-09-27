<?php

/** @var Router $router */

$router->get('/portal/classes', [ClassDemoController::class, 'index'], 'manage_classes');
$router->get('/portal/classes/create', [ClassDemoController::class, 'create'], 'manage_classes');
$router->get('/portal/classes/show', [ClassDemoController::class, 'show'], 'manage_classes');

$router->get('/portal/classes/sessions', [ClassDemoController::class, 'sessions'], 'manage_classes');
$router->get('/portal/classes/sessions/create', [ClassDemoController::class, 'createSession'], 'manage_classes');
$router->get('/portal/classes/sessions/show', [ClassDemoController::class, 'showSession'], 'manage_classes');

$router->get('/personal-training/packages', [PersonalTrainingDemoController::class, 'packagesIndex'], 'manage_personal_training');
$router->get('/personal-training/packages/form', [PersonalTrainingDemoController::class, 'packageForm'], 'manage_personal_training');
$router->get('/personal-training/packages/show', [PersonalTrainingDemoController::class, 'packageShow'], 'manage_personal_training');