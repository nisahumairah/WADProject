<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuranController;

Route::get('/', function () {
    return view('mainpage');
});

// Motivation Routes
Route::get('/motivations', [QuranController::class, 'index'])->name('motivations.index');
Route::get('/motivations/create', [QuranController::class, 'create'])->name('motivations.create');
Route::post('/motivations', [QuranController::class, 'store'])->name('motivations.store');
Route::delete('/motivations/{id}', [QuranController::class, 'destroy'])->name('motivations.destroy');
Route::get('/motivations/{id}/edit', [QuranController::class, 'edit'])->name('motivations.edit');
Route::put('/motivations/{id}', [QuranController::class, 'update'])->name('motivations.update');
Route::post('/motivations/{id}/like', [LikeController::class, 'toggle'])->name('motivations.like');
Route::post('/motivations/{id}/like', [QuranController::class, 'like'])->name('motivations.like');
Route::get('/motivations/{id}', [QuranicController::class, 'show'])->name('motivations.show');