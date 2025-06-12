<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NutritionController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/nutrition', [NutritionController::class, 'index'])->name('nutrition');
Route::get('/nutrition/load', [NutritionController::class, 'load'])->name('nutrition.load');

