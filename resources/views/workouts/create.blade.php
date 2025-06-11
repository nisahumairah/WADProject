@extends('master.layout')

@section('title', 'Add New Workout')

@section('content')
    <h4 class="page-title">Add New Workout</h4>

    <form action="{{ route('workouts.store') }}" method="POST">
        @csrf
        <!-- Workout Type -->
        <div class="form-group">
            <label for="workout_type">Workout Type</label>
            <select name="workout_type" class="form-control" required>
                <option value="Cardio">Cardio</option>
                <option value="Strength Training">Strength Training</option>
                <option value="Yoga">Yoga</option>
                <option value="Pilates">Pilates</option>
                <option value="Running">Running</option>
                <option value="Cycling">Cycling</option>
                <!-- Add more workout types as needed -->
            </select>
        </div>

        <!-- Duration -->
        <div class="form-group">
            <label for="duration">Duration (minutes)</label>
            <input type="number" name="duration" class="form-control" required>
        </div>

        <!-- Calories Burned -->
        <div class="form-group">
            <label for="calories_burned">Calories Burned</label>
            <input type="number" name="calories_burned" class="form-control" required>
        </div>

        <!-- Sets -->
        <div class="form-group">
            <label for="sets">Sets</label>
            <input type="number" name="sets" class="form-control" required>
        </div>

        <!-- Reps -->
        <div class="form-group">
            <label for="reps">Reps</label>
            <input type="number" name="reps" class="form-control" required>
        </div>

        <!-- Workout Date -->
        <div class="form-group">
            <label for="workout_date">Workout Date</label>
            <input type="date" name="workout_date" class="form-control" required>
        </div>

        <!-- Save Button -->
        <button type="submit" class="btn btn-primary">Save Workout</button>
    </form>
@endsection
