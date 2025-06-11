<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutPostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AuthController;


// Default Route
Route::get('/', function () {
    return view('auth.landing');
});


// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware to protect routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

//Display Profile
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

//Display Community Page
use App\Models\ForumTopic;
use App\Models\WorkoutPost;

Route::get('/community', function () {
    $trendingTopics = ForumTopic::latest()->take(3)->get();

    $popularWorkouts = WorkoutPost::withCount('likes')
        ->orderBy('likes_count', 'desc')
        ->take(4)
        ->get();

    return view('community.index', compact('trendingTopics', 'popularWorkouts'));
})->name('community.index');


// Community Routes
Route::prefix('community')->group(function () {
    // Workout Posts
    Route::get('/workouts', [WorkoutPostController::class, 'index'])->name('community.workouts.index');
    Route::get('/workouts/create', [WorkoutPostController::class, 'create'])->name('community.workouts.create');
    Route::post('/workouts', [WorkoutPostController::class, 'store'])->name('community.workouts.store');
    Route::get('/workouts/{workoutPost}', [WorkoutPostController::class, 'show'])->name('community.workouts.show');
    Route::delete('/community/workouts/{workoutPost}', [WorkoutPostController::class, 'destroy'])->name('community.workouts.destroy');

    // Forum Discussions
    Route::get('/discussions', [ForumController::class, 'index'])->name('community.discussions.index');
    Route::get('/discussions/create', [ForumController::class, 'create'])->name('community.discussions.create');
    Route::post('/discussions', [ForumController::class, 'store'])->name('community.discussions.store');
    Route::get('/discussions/{forumTopic}', [ForumController::class, 'show'])->name('community.discussions.show');
    Route::delete('/discussions/{forumTopic}', [ForumController::class, 'destroy'])->name('community.discussions.destroy');
    Route::post('/discussions/replies/{reply}/mark-helpful', [ForumController::class, 'markHelpfulReply'])->name('community.discussions.replies.mark-helpful');



    // Comments
    Route::post('/workouts/{workoutPost}/comments', [CommentController::class, 'storeWorkoutComment'])->name('community.workouts.comments.store');
    Route::post('/discussions/{forumTopic}/comments', [CommentController::class, 'storeForumComment'])->name('community.discussions.comments.store');

    // Likes
    Route::post('/workouts/{workoutPost}/like', [LikeController::class, 'toggleWorkoutLike'])->name('community.workouts.like');
    Route::post('/comments/{comment}/like', [LikeController::class, 'toggleForumCommentLike'])->name('community.comments.like');

    // Edit / Update Workout Posts
    Route::get('/workouts/{workoutPost}/edit', [WorkoutPostController::class, 'edit'])->name('community.workouts.edit');
    Route::put('/workouts/{workoutPost}', [WorkoutPostController::class, 'update'])->name('community.workouts.update');
});



