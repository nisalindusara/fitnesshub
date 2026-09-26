<?php
// Daily plans (workout & meal plans)

// Opened from My Clients by clicking a client — ?member={id}
$router->get('/my-clients/client', [WorkoutPlanController::class, 'showWorkoutPlanScreen'], 'manage_action_plans');
