<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GoalController extends Controller
{
 public function index(Request $request)
{
    $query = Goal::query();

    // 🔍 Filtering by type (weight, workout, etc.)
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    // 🔍 Filtering by status
    if ($request->filled('status')) {
        $today = now();

        $query->when($request->status === 'completed', fn($q) =>
            $q->whereColumn('current_progress', '>=', 'target_value')
        );

        $query->when($request->status === 'active', fn($q) =>
            $q->whereColumn('current_progress', '<', 'target_value')
                ->whereDate('end_date', '>=', $today)
        );

        $query->when($request->status === 'overdue', fn($q) =>
            $q->whereColumn('current_progress', '<', 'target_value')
                ->whereDate('end_date', '<', $today)
        );
    }

    // 🔄 Sorting
    switch ($request->sort_by) {
        case 'deadline':
            $query->orderBy('end_date');
            break;
        case 'progress':
            $query->orderByRaw('current_progress / NULLIF(target_value, 0) DESC');
            break;
        default:
            $query->orderBy('created_at', 'desc');
            break;
    }

    // 👇 Fetch filtered and sorted results
    $goals = $query->get();

    // 🔢 Calculate progress for progress bars
    $progressData = [
        'weight' => $this->calculateProgress($goals, 'weight'),
        'workout' => $this->calculateProgress($goals, 'workout'),
        'water' => $this->calculateProgress($goals, 'water'),
    ];

    // 📆 Calculate days remaining for each goal
    foreach ($goals as $goal) {
        $goal->days_remaining = $this->calculateDaysRemaining($goal->end_date);
    }

    return view('goals.index', compact('goals', 'progressData'));
}


    private function calculateProgress($goals, $type)
    {
        $goal = $goals->firstWhere('type', $type);
        if (!$goal || $goal->target_value <= 0) return 0;

        return round(min(100, $goal->current_progress / $goal->target_value * 100));
    }

    private function calculateDaysRemaining($endDate)
    {
        if (!$endDate) return null;

        $now = Carbon::now();
        $end = Carbon::parse($endDate);
        return max(0, $now->diffInDays($end, false));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'target_value' => 'required|numeric|min:1',
            'current_progress' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Goal::create([
            'title' => $request->title,
            'type' => $request->type,
            'target_value' => $request->target_value,
            'current_progress' => $request->current_progress ?? 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('goals.index')->with('success', 'Goal created successfully!');
    }

    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'target_value' => 'required|numeric|min:1',
            'current_progress' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $goal->update([
            'title' => $request->title,
            'type' => $request->type,
            'target_value' => $request->target_value,
            'current_progress' => $request->current_progress ?? 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('goals.index')->with('success', 'Goal updated successfully!');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return back()->with('success', 'Goal deleted successfully!');
    }

    public function updateSpecificGoal(Request $request, $type)
    {
        $goal = Goal::where('type', $type)->firstOrFail();

        $request->validate([
            'current_progress' => 'required|numeric|min:0',
        ]);

        $goal->current_progress = $request->current_progress;
        $goal->save();

        $percentage = $goal->target_value > 0
            ? min(100, round(($goal->current_progress / $goal->target_value) * 100))
            : 0;

        return response()->json([
            'success' => true,
            'percentage' => $percentage,
            'current' => $goal->current_progress,
            'target' => $goal->target_value,
        ]);
    }

    public function updateWeight(Request $request)
    {
        return $this->updateSpecificGoal($request, 'weight');
    }

    public function updateWorkout(Request $request)
    {
        return $this->updateSpecificGoal($request, 'workout');
    }

    public function updateWater(Request $request)
    {
        return $this->updateSpecificGoal($request, 'water');
    }
}
