<?php

/** @var Router $router */

$router->get(
    '/my-schedule',
    [InstructorScheduleController::class, 'mySchedule'],
    'view_own_schedule'
);