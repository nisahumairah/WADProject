<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;

Route::get('/', fn() => view('dashboard'))->name('dashboard');

Route::resource('goals', GoalController::class);

Route::post('/goals/update-weight', [GoalController::class, 'updateWeight'])->name('goals.updateWeight');
Route::post('/goals/update-workout', [GoalController::class, 'updateWorkout'])->name('goals.updateWorkout');
Route::post('/goals/update-water', [GoalController::class, 'updateWater'])->name('goals.updateWater');
