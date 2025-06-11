<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('workouts', WorkoutController::class);
Route::get('workouts/progress', [WorkoutController::class, 'progress'])->name('workouts.progress');

