<?php
// Daily plans (workout & meal plans)

// Clicking a client in My Clients opens their workout plan — ?member={id}
$router->get('/my-clients/client', [WorkoutPlanController::class, 'showWorkoutPlanScreen'], 'manage_action_plans');
$router->post('/my-clients/workout-plan/save', [WorkoutPlanController::class, 'saveWorkoutPlan'], 'manage_action_plans');
$router->post('/my-clients/workout-plan/delete', [WorkoutPlanController::class, 'deleteWorkoutPlan'], 'manage_action_plans');
$router->get('/my-clients/workout-plan/previous', [WorkoutPlanController::class, 'previousWorkoutPlan'], 'manage_action_plans');
