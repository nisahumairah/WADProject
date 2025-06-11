<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeWorkoutComment(Request $request, $workoutPostId)
    {
        $request->validate(['content' => 'required|string|max:1000']);

        $comment = auth()->user()->workoutComments()->create([
            'workout_post_id' => $workoutPostId,
            'content' => $request->content
        ]);

        return back()->with('success', 'Comment added!');
    }

    public function storeForumComment(Request $request, $forumTopicId)
    {
        $request->validate(['content' => 'required|string|max:1000']);

        $comment = auth()->user()->forumReplies()->create([
            'forum_topic_id' => $forumTopicId,
            'content' => $request->content
        ]);

        return back()->with('success', 'Reply added!');
    }
}
