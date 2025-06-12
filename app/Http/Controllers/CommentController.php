<?php

namespace App\Http\Controllers;

use App\Models\WorkoutPost;
use App\Models\ForumTopic;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeWorkoutComment(Request $request, WorkoutPost $workoutPost)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment = $workoutPost->comments()->create([
            'user_id' => Auth::id(), // Changed from auth()->id()
            'content' => $request->input('content') // Changed from $request->content
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function storeForumComment(Request $request, ForumTopic $forumTopic)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment = $forumTopic->replies()->create([
            'user_id' => Auth::id(), // Changed from auth()->id()
            'content' => $request->input('content') // Changed from $request->content
        ]);

        return back()->with('success', 'Reply added successfully!');
    }
}
