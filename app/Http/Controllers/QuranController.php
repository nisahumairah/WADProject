<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motivation;

class QuranController extends Controller
{
    public function index()
    {
        $motivations = Motivation::latest()->get();
        return view('motivations.index', compact('motivations'));
    }

    public function create()
    {
        return view('motivations.addmotivation');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'quote' => 'required|string',
        'source' => 'required|string',
        'reflection' => 'nullable|string',
        'image_url' => 'nullable|image|max:2048',
        'difficulty_level' => 'required|in:easy,moderate,challenging',
        'category_tag' => 'nullable|string',
        'author_id' => 'nullable',
    ]);

    if ($request->hasFile('image_url')) {
        $imagePath = $request->file('image_url')->store('motivations', 'public');
        $validatedData['image_url'] = $imagePath;
    }

    // Skip saving author_id since there's no auth
    unset($validatedData['author_id']);

    Motivation::create($validatedData);

    return redirect()->route('motivations.index')->with('success', 'Motivation added successfully!');
}

    public function destroy($id)
    {
        $motivation = Motivation::findOrFail($id);
        $motivation->delete();

        return redirect()->back()->with('success', 'Motivation deleted successfully.');
    }
    public function edit($id)
{
    $motivation = Motivation::findOrFail($id);
    return view('motivations.editmotivation', compact('motivation'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'quote' => 'required|string',
        'source' => 'required|string',
        'reflection' => 'nullable|string',
        'image_url' => 'nullable|image|max:2048',
        'difficulty_level' => 'required|in:easy,moderate,challenging',
        'category_tag' => 'nullable|string',
        'author_id' => 'nullable',
    ]);

    if ($request->hasFile('image_url')) {
        $imagePath = $request->file('image_url')->store('motivations', 'public');
        $validatedData['image_url'] = $imagePath;
    }

    unset($validatedData['author_id']);

    $motivation = Motivation::findOrFail($id);
    $motivation->update($validatedData);

    return redirect()->route('motivations.index')->with('success', 'Motivation updated successfully!');
}
public function like($id)
{
    $motivation = Motivation::findOrFail($id);

    // Increase like count (you can also log IP or use a Like model if you want)
    $motivation->likes_count = ($motivation->likes_count ?? 0) + 1;
    $motivation->save();

    return back();
}
public function show($id)
{
    $motivation = Motivation::findOrFail($id);
    return view('quranayahs.show', compact('motivation'));
}


}
