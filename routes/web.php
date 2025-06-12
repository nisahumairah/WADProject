<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutPostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MotivationController;
use App\Models\ForumTopic;
use App\Models\WorkoutPost;

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

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    // Goal-related routes
    Route::resource('goals', GoalController::class);
    Route::post('/goals/update-weight', [GoalController::class, 'updateWeight'])->name('goals.updateWeight');
    Route::post('/goals/update-workout', [GoalController::class, 'updateWorkout'])->name('goals.updateWorkout');
    Route::post('/goals/update-water', [GoalController::class, 'updateWater'])->name('goals.updateWater');

    // Workout-related routes
    Route::resource('workouts', WorkoutController::class);
    Route::get('workouts/progress', [WorkoutController::class, 'progress'])->name('workouts.progress');
});

// Community Routes
Route::prefix('community')->group(function () {
    Route::get('/', function () {
        $trendingTopics = ForumTopic::latest()->take(3)->get();
        $popularWorkouts = WorkoutPost::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(4)
            ->get();
        return view('community.index', compact('trendingTopics', 'popularWorkouts'));
    })->name('community.index');

    // Workout Posts
    Route::resource('workouts', WorkoutPostController::class)->names([
        'index' => 'community.workouts.index',
        'create' => 'community.workouts.create',
        'store' => 'community.workouts.store',
        'show' => 'community.workouts.show',
        'edit' => 'community.workouts.edit',
        'update' => 'community.workouts.update',
        'destroy' => 'community.workouts.destroy'
    ]);

    // Forum Discussions
    Route::resource('discussions', ForumController::class)->names([
        'index' => 'community.discussions.index',
        'create' => 'community.discussions.create',
        'store' => 'community.discussions.store',
        'show' => 'community.discussions.show',
        'destroy' => 'community.discussions.destroy'
    ]);
    Route::post('/discussions/replies/{reply}/mark-helpful', [ForumController::class, 'markHelpfulReply'])->name('community.discussions.replies.mark-helpful');

    // Comments
    Route::post('/workouts/{workoutPost}/comments', [CommentController::class, 'storeWorkoutComment'])->name('community.workouts.comments.store');
    Route::post('/discussions/{forumTopic}/comments', [CommentController::class, 'storeForumComment'])->name('community.discussions.comments.store');

    // Likes
    Route::post('/workouts/{workoutPost}/like', [LikeController::class, 'toggleWorkoutLike'])->name('community.workouts.like');
    Route::post('/comments/{comment}/like', [LikeController::class, 'toggleForumCommentLike'])->name('community.comments.like');
});

    // Motivation Routes
    Route::middleware(['auth'])->group(function () {
    Route::resource('motivations', MotivationController::class)->except(['show']);
    });

    Route::get('motivations/{motivation}', [MotivationController::class, 'show'])->name('motivations.show');
    Route::get('motivations/{motivation}/edit', [MotivationController::class, 'edit'])->name('motivations.edit');
    Route::post('/motivations/{motivation}/bookmark', [MotivationController::class, 'toggleBookmark'])->middleware('auth')->name('motivations.bookmark');
    Route::post('/motivations/{motivation}/like', [MotivationController::class, 'toggleLike'])->middleware('auth')->name('motivations.like');
