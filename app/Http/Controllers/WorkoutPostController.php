<?php

namespace App\Http\Controllers;

use App\Models\WorkoutPost;
use Illuminate\Http\Request;

class WorkoutPostController extends Controller
{
    public function index()
    {
        $posts = WorkoutPost::with(['user', 'comments.user', 'likes'])
            ->latest()
            ->paginate(10);

        return view('community.workouts.index', compact('posts'));
    }

    public function create()
    {
        return view('community.workouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'muscle_groups' => 'required|array',
            'media' => 'nullable|image|max:2048'
        ]);

        $post = auth()->user()->workoutPosts()->create([
            'title' => $request->title,
            'description' => $request->content,
            'difficulty' => $request->difficulty,
            'targeted_muscles' => implode(',', $request->muscle_groups)
        ]);

        if ($request->hasFile('media')) {
            $post->media_path = $request->file('media')->store('workout_media', 'public');
            $post->save();
        }

        return redirect()->route('community.workouts')->with('success', 'Workout shared successfully!');
    }

    public function show(WorkoutPost $workoutPost)
    {
        $workoutPost->load(['user', 'comments.user', 'likes']);
        return view('community.workouts.show', compact('workoutPost'));
    }
}
