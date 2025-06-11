<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WorkoutController extends Controller
{
    // Show all workouts with search and filters
    public function index(Request $request)
    {
        // Get search and filter parameters
        $search = $request->get('search');
        $workoutType = $request->get('workout_type');
        $workoutDate = $request->get('workout_date');

        // Build query with filters
        $workouts = Workout::query();

        if ($search) {
            $workouts->where('workout_type', 'like', '%' . $search . '%');
        }

        if ($workoutType) {
            $workouts->where('workout_type', $workoutType);
        }

        if ($workoutDate) {
            $workouts->whereDate('workout_date', $workoutDate);  // Ensure only a single date filter is applied
        }

        // Get the filtered workouts
        $workouts = $workouts->get();

        return view('workouts.index', compact('workouts'));
    }

    // Show the form to create a new workout
    public function create()
    {
        return view('workouts.create');
    }

    // Store a new workout
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'workout_type' => 'required|string',
            'duration' => 'required|integer',
            'calories_burned' => 'required|integer',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'workout_date' => 'required|date',
        ]);

        // Create the new workout entry
        Workout::create($validated);

        return redirect()->route('workouts.index');
    }

    // Edit a specific workout
    public function edit($id)
    {
        $workout = Workout::findOrFail($id);
        return view('workouts.edit', compact('workout'));
    }

    // Update the workout
    public function update(Request $request, $id)
    {
        $workout = Workout::findOrFail($id);

        // Validate and update the workout
        $validated = $request->validate([
            'workout_type' => 'required|string',
            'duration' => 'required|integer',
            'calories_burned' => 'required|integer',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'workout_date' => 'required|date',
        ]);

        $workout->update($validated);

        return redirect()->route('workouts.index');
    }

    // Delete a workout
    public function destroy($id)
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();

        return redirect()->route('workouts.index');
    }

    public function progress()
    {
        // Fetch and group workout data by week
        $workoutProgress = Workout::all()->groupBy(function ($workout) {
            return Carbon::parse($workout->workout_date)->format('W'); // Group by week number
        })->map(function ($weekWorkouts) {
            return [
                'week' => 'Week ' . $weekWorkouts->first()->workout_date->format('W'),
                'calories' => $weekWorkouts->sum('calories_burned')
            ];
        });

        // Milestone for personal best
        $milestones = [];
        $highestCalories = $workoutProgress->max('calories');
        if ($highestCalories > 500) { // Example milestone
            $milestones[] = "New Personal Best: Burned more than 500 calories in a week!";
        }

        // Pass data to the view
        return view('workouts.progress', compact('workoutProgress', 'milestones'));
    }
}
