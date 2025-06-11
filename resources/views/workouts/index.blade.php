@extends('master.layout')

@section('title', 'Workout Tracker')

@section('content')
    <h4 class="page-title">Your Workouts</h4>

    <a href="{{ route('workouts.create') }}" class="btn btn-primary mb-3">
        <i class="la la-plus"></i> Add New Workout
    </a>

    <!-- Search Bar and Filter Form -->
    <form method="GET" action="{{ route('workouts.index') }}" class="form-inline mb-3">
        <div class="form-group mr-3">
            <input type="text" name="search" class="form-control" placeholder="Search by workout type" value="{{ request('search') }}">
        </div>
        <div class="form-group mr-3">
            <select name="workout_type" class="form-control">
                <option value="">All Types</option>
                <option value="Cardio" {{ request('workout_type') == 'Cardio' ? 'selected' : '' }}>Cardio</option>
                <option value="Strength Training" {{ request('workout_type') == 'Strength Training' ? 'selected' : '' }}>Strength Training</option>
                <option value="Yoga" {{ request('workout_type') == 'Yoga' ? 'selected' : '' }}>Yoga</option>
            </select>
        </div>
        <div class="form-group mr-3">
            <input type="date" name="workout_date" class="form-control" value="{{ request('workout_date') }}">
        </div>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>

    <!-- Show success or error messages (Optional) -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Workouts Table -->
    <table class="table table-hover table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>Workout Type</th>
                <th>Duration</th>
                <th>Calories Burned</th>
                <th>Sets/Reps</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workouts as $workout)
                <tr>
                    <td>{{ $workout->workout_type }}</td>
                    <td>{{ $workout->duration }} minutes</td>
                    <td>{{ $workout->calories_burned }} kcal</td>
                    <td>{{ $workout->sets }} sets x {{ $workout->reps }} reps</td>
                    <td>{{ $workout->workout_date }}</td>
                    <td class="text-center">
                        <!-- Edit Button with tooltip -->
                        <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="la la-edit"></i>
                        </a>

                        <!-- Delete Button with confirmation and tooltip -->
                        <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST" style="display:inline;" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this workout?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="la la-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('scripts')
    <!-- Tooltip Initialization -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();  // Initialize tooltips
        });
    </script>
@endsection
