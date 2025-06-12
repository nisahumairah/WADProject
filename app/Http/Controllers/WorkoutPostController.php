<?php

namespace App\Http\Controllers;

use App\Models\WorkoutPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WorkoutPostController extends Controller
{
    use AuthorizesRequests;
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
        $post = WorkoutPost::create([
            'title' => $request->title,
            'description' => $request->content,
            'difficulty' => $request->difficulty,
            'targeted_muscles' => implode(',', $request->muscle_groups),
            'user_id' => Auth::id() // Manually set user_id
        ]);

        if ($request->hasFile('media')) {
            $post->media_path = $request->file('media')->store('workout_media', 'public');
            $post->save();
        }

        return redirect()->route('community.workouts.show', $post->id)
        ->with('success', 'Workout shared successfully!');
    }

    public function show(WorkoutPost $workoutPost)
    {
        $workoutPost->load(['user', 'comments.user', 'likes']);
        return view('community.workouts.show', ['post' => $workoutPost]);
    }

    public function edit(WorkoutPost $workoutPost)
    {
    // Ensure only the owner can edit
    if (Auth::id() !== $workoutPost->user_id) {
        abort(403);
    }

    return view('community.workouts.edit', compact('workoutPost'));
    }

    public function update(Request $request, WorkoutPost $workoutPost)
{
    // Authorization check
    if (Auth::id() !== $workoutPost->user_id) {
        abort(403);
    }

    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'difficulty' => 'required|in:beginner,intermediate,advanced',
        'muscle_groups' => 'required|array',
        'media' => 'nullable|image|max:2048',
        'remove_image' => 'nullable|boolean',
    ]);

    $workoutPost->title = $request->title;
    $workoutPost->description = $request->content;
    $workoutPost->difficulty = $request->difficulty;
    $workoutPost->targeted_muscles = implode(',', $request->muscle_groups);

    // Handle image removal
    if ($request->has('remove_image') && $workoutPost->media_path) {
        Storage::disk('public')->delete($workoutPost->media_path);
        $workoutPost->media_path = null;
    }

    // Handle image upload
    if ($request->hasFile('media')) {
        if ($workoutPost->media_path) {
            Storage::disk('public')->delete($workoutPost->media_path);
        }
        $workoutPost->media_path = $request->file('media')->store('workout_media', 'public');
    }

    $workoutPost->save();

    return redirect()->route('community.workouts.show', $workoutPost->id)
        ->with('success', 'Workout updated successfully!');
    }

    public function destroy(WorkoutPost $workoutPost)
    {
    // Check if the authenticated user is the owner
    if (Auth::id() !== $workoutPost->user_id) {
        abort(403, 'Unauthorized action.');
    }

    // Optionally delete media
    if ($workoutPost->media_path && Storage::disk('public')->exists($workoutPost->media_path)) {
        Storage::disk('public')->delete($workoutPost->media_path);
    }

    $workoutPost->delete();

    return redirect()->route('community.workouts.index')->with('success', 'Workout deleted successfully.');
}



}
