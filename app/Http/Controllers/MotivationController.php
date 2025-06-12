<?php

namespace App\Http\Controllers;

use App\Models\Motivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotivationController extends Controller
{
    public function index()
    {
    $motivations = Motivation::latest()->paginate(10);
    return view('motivations.index', compact('motivations'));
    }

    public function create()
    {
    return view('motivations.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'quote' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category' => 'required|string|max:255',
        'tags' => 'nullable|string|max:255',
        'source' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('motivations', 'public');
    }

    Motivation::create([
        'quote' => $request->quote,
        'description' => $request->description,
        'category' => $request->category,
        'tags' => $request->tags,
        'source' => $request->source,
        'image' => $imagePath,
        'user_id' => Auth::user()->id, // ✅ Securely associate current user
    ]);

    return redirect()->route('motivations.index')->with('success', 'Motivation created successfully!');
}

    public function toggleBookmark(Motivation $motivation)
    {
    $user = Auth::user();
    if ($user->bookmarkedMotivations->contains($motivation->id)) {
        $user->bookmarkedMotivations()->detach($motivation->id);
    } else {
        $user->bookmarkedMotivations()->attach($motivation->id);
    }
    return back();
    }

    public function toggleLike(Motivation $motivation)
    {
    $user = Auth::user();
    if ($user->likedMotivations->contains($motivation->id)) {
        $user->likedMotivations()->detach($motivation->id);
    } else {
        $user->likedMotivations()->attach($motivation->id);
    }
    return back();
    }

    public function edit(Motivation $motivation)
    {
    // Only allow the owner to edit
    if ($motivation->user_id !== auth()->id()) {
        abort(403);
    }

    return view('motivations.edit', compact('motivation'));
    }

    public function update(Request $request, Motivation $motivation)
    {
    if ($motivation->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'quote' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category' => 'required|string|max:255',
        'tags' => 'nullable|string|max:255',
        'source' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('motivations', 'public');
        $motivation->image = $imagePath;
    }

    $motivation->update($request->only(['quote', 'description', 'category', 'tags', 'source']));

    return redirect()->route('motivations.index')->with('success', 'Motivation updated!');
    }

    public function destroy(Motivation $motivation)
    {
    if ($motivation->user_id !== auth()->id()) {
        abort(403);
    }

    $motivation->delete();

    return redirect()->route('motivations.index')->with('success', 'Motivation deleted!');
    }


}
