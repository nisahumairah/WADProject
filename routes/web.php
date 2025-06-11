<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Community Routes
Route::prefix('community')->group(function () {
    // Workout Posts
    Route::get('/workouts', [WorkoutPostController::class, 'index'])->name('community.workouts');
    Route::get('/workouts/create', [WorkoutPostController::class, 'create'])->name('community.workouts.create');
    Route::post('/workouts', [WorkoutPostController::class, 'store'])->name('community.workouts.store');
    Route::get('/workouts/{workoutPost}', [WorkoutPostController::class, 'show'])->name('community.workouts.show');

    // Forum Discussions
    Route::get('/discussions', [ForumController::class, 'index'])->name('community.discussions');
    Route::get('/discussions/create', [ForumController::class, 'create'])->name('community.discussions.create');
    Route::post('/discussions', [ForumController::class, 'store'])->name('community.discussions.store');
    Route::get('/discussions/{forumTopic}', [ForumController::class, 'show'])->name('community.discussions.show');

    // Comments
    Route::post('/workouts/{workoutPost}/comments', [CommentController::class, 'storeWorkoutComment'])->name('community.workouts.comments.store');
    Route::post('/discussions/{forumTopic}/comments', [CommentController::class, 'storeForumComment'])->name('community.discussions.comments.store');

    // Likes
    Route::post('/workouts/{workoutPost}/like', [LikeController::class, 'toggleLike'])->name('community.workouts.like');
    Route::post('/comments/{comment}/like', [LikeController::class, 'toggleLike'])->name('community.comments.like');
});

