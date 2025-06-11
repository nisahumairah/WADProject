<?php

namespace App\Http\Controllers;

use App\Models\ForumTopic;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $topics = ForumTopic::with(['user', 'replies.user', 'likes'])
            ->latest()
            ->paginate(10);

        $popularTopics = ForumTopic::withCount('replies')
            ->orderBy('replies_count', 'desc')
            ->take(5)
            ->get();

        return view('community.discussions.index', [
            'topics' => $topics,
            'popularTopics' => $popularTopics
        ]);
    }

    public function create()
    {
        return view('community.discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        auth()->user()->forumTopics()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('community.discussions')->with('success', 'Discussion started successfully!');
    }

    public function show(ForumTopic $forumTopic)
    {
        $forumTopic->load(['user', 'replies.user', 'likes']);
        $forumTopic->incrementViews();

        return view('community.discussions.show', compact('forumTopic'));
    }
}
