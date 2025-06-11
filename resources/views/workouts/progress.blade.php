@extends('master.layout')

@section('title', 'Your Workout Progress')

@section('content')
    <h4 class="page-title">Your Workout Progress</h4>

    <!-- Progress Summary Box -->
    <div class="card mb-4">
        <div class="card-body">
            <h5>Total Workouts: {{ $workoutProgress->count() }}</h5>
            <h5>Average Duration: {{ $workoutProgress->avg('duration') }} minutes</h5>
            <h5>Total Calories Burned: {{ $workoutProgress->sum('calories_burned') }} kcal</h5>
        </div>
    </div>

    <!-- Display Milestones (if any) -->
    @if(!empty($milestones))
        <div class="alert alert-info">
            <ul>
                @foreach($milestones as $milestone)
                    <li>{{ $milestone }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- The Canvas where the Chart will be rendered -->
    <canvas id="progressChart" width="400" height="200"></canvas>

@endsection

@section('scripts')
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Dynamic workout progress data from controller
        const workoutData = @json($workoutProgress);

        // Prepare the labels (weeks) and data (calories burned)
        const labels = workoutData.map(item => item.week);  // Week labels like "Week 1", "Week 2", etc.
        const caloriesData = workoutData.map(item => item.calories);  // Corresponding calories burned

        // Initialize the Chart.js chart
        var ctx = document.getElementById('progressChart').getContext('2d');
        var progressChart = new Chart(ctx, {
            type: 'line',  // Chart type (line chart in this case)
            data: {
                labels: labels,  // X-axis labels (week labels)
                datasets: [{
                    label: 'Calories Burned',
                    data: caloriesData,  // Data for calories burned each week
                    borderColor: 'rgba(75, 192, 192, 1)',  // Line color
                    fill: false  // Don’t fill the area under the line
                }]
            }
        });
    </script>
@endsection
