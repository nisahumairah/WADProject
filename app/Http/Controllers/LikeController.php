<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $likeableId)
    {
        $likeableType = $request->likeable_type; // 'App\Models\WorkoutPost' or 'App\Models\Comment'

        $existingLike = Like::where([
            'user_id' => auth()->id(),
            'likeable_id' => $likeableId,
            'likeable_type' => $likeableType
        ])->first();

        if ($existingLike) {
            $existingLike->delete();
            $action = 'unliked';
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'likeable_id' => $likeableId,
                'likeable_type' => $likeableType
            ]);
            $action = 'liked';
        }

        $likesCount = $likeableType::find($likeableId)->likes->count();

        return response()->json([
            'action' => $action,
            'likes' => $likesCount
        ]);
    }
}
