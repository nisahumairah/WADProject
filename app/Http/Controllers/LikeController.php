<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\WorkoutPost;
use App\Models\Comment;
use App\Models\WorkoutComment;
use App\Models\ForumReply;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // Generic toggle method that can handle different likeable types
    public function toggleLike(Request $request, $likeableType, $id)
    {
        $likeable = $this->getLikeableModel($likeableType, $id);

        if (!$likeable) {
            return $request->ajax()
                ? response()->json(['error' => 'Invalid likeable type'], 404)
                : back()->with('error', 'Invalid likeable type');
        }

        $like = $likeable->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            $action = 'unliked';
        } else {
            $likeable->likes()->create(['user_id' => Auth::id()]);
            $action = 'liked';
        }

        if ($request->ajax()) {
            return response()->json([
                'action' => $action,
                'likes_count' => $likeable->likes()->count(),
                'likeable_type' => $likeableType,
                'likeable_id' => $id
            ]);
        }

        return back();
    }

    // Your existing methods (keep them for backward compatibility)
    public function toggleWorkoutLike(Request $request, WorkoutPost $workoutPost)
    {
        return $this->handleLikeToggle($request, $workoutPost);
    }

    public function toggleCommentLike(Request $request, WorkoutComment $comment)
    {
        return $this->handleLikeToggle($request, $comment);
    }

    // New method for forum comments
    public function toggleForumCommentLike(Request $request, ForumReply $comment)
    {
        return $this->handleLikeToggle($request, $comment);
    }

    // Helper methods
    protected function handleLikeToggle($request, $likeable)
    {
        $like = $likeable->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            $action = 'unliked';
        } else {
            $likeable->likes()->create(['user_id' => Auth::id()]);
            $action = 'liked';
        }

        if ($request->ajax()) {
            return response()->json([
                'action' => $action,
                'likes_count' => $likeable->likes()->count()
            ]);
        }

        return back();
    }

    protected function getLikeableModel($type, $id)
    {
        switch ($type) {
            case 'workout':
                return WorkoutPost::find($id);
            case 'workout-comment':
                return WorkoutComment::find($id);
            case 'forum-comment':
                return ForumReply::find($id);
            default:
                return null;
        }
    }
}
