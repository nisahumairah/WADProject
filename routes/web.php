<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\WorkoutController;

// Homepage route
Route::get('/', fn() => view('dashboard'))->name('dashboard');

// Goal-related routes
Route::resource('goals', GoalController::class);
Route::post('/goals/update-weight', [GoalController::class, 'updateWeight'])->name('goals.updateWeight');
Route::post('/goals/update-workout', [GoalController::class, 'updateWorkout'])->name('goals.updateWorkout');
Route::post('/goals/update-water', [GoalController::class, 'updateWater'])->name('goals.updateWater');

// Workout-related routes
Route::resource('workouts', WorkoutController::class);
Route::get('workouts/progress', [WorkoutController::class, 'progress'])->name('workouts.progress');
