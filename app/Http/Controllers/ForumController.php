<?php

namespace App\Http\Controllers;

use App\Models\ForumTopic;
use App\Models\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $topics = ForumTopic::with(['user', 'replies'])
            ->withCount('replies')
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

        ForumTopic::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('community.discussions.index')->with('success', 'Discussion started successfully!');
    }

    public function show(ForumTopic $forumTopic)
    {
    $forumTopic->load(['user','replies.user','replies.likes']);
    return view('community.discussions.show', ['topic' => $forumTopic]);

    $forumTopic->incrementViews();

    return view('community.discussions.show', compact('forumTopic'));
    }

    public function markHelpfulReply(ForumReply $reply)
    {
    // Optional: authorize only topic owner or admin
    $reply->is_helpful = true;
    $reply->save();

    return back()->with('success', 'Reply marked as helpful!');
    }

}
