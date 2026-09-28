<?php

// Daily plans (workout & meal plans)
// Clicking a client in My Clients opens their workout plan — ?member={id}
$router->get('/portal/clients/workout-plan', [WorkoutPlanController::class, 'showWorkoutPlanScreen'], 'manage_action_plans');
$router->post('/portal/clients/workout-plan/save', [WorkoutPlanController::class, 'saveWorkoutPlan'], 'manage_action_plans');
$router->post('/portal/clients/workout-plan/delete', [WorkoutPlanController::class, 'deleteWorkoutPlan'], 'manage_action_plans');

// Meal plan requests: members (not necessarily the instructor's clients) ask a specific instructor for a meal plan
$router->get('/portal/meal-plan-requests', [MealPlanRequestController::class, 'index'], 'manage_action_plans');
$router->get('/portal/meal-plan-requests/plan', [MealPlanRequestController::class, 'showMealPlanScreen'], 'manage_action_plans');
$router->post('/portal/meal-plan-requests/save', [MealPlanRequestController::class, 'saveMealPlan'], 'manage_action_plans');

// Plans across all clients, and how well members stick to them
$router->get('/portal/action-plans', [ActionPlanController::class, 'showAssignedPlansScreen'], 'manage_action_plans');
$router->get('/portal/adherence', [ActionPlanController::class, 'showAdherenceScreen'], 'view_adherence');

// JSON
$router->get('/api/workout-plans/previous', [WorkoutPlanController::class, 'previousWorkoutPlan'], 'manage_action_plans');
$router->post('/api/exercises', [WorkoutPlanController::class, 'addLibraryExercise'], 'manage_action_plans');
