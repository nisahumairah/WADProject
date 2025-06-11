@extends('master.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Goals & Progress</h2>

    <div class="row">
        @php
            $circleGoalTypes = ['weight', 'workout', 'water'];
            $colors = ['weight' => '#28a745', 'workout' => '#17a2b8', 'water' => '#fd7e14'];
        @endphp

        @foreach ($circleGoalTypes as $type)
            @php $goal = $goals->firstWhere('type', $type); @endphp
            @if ($goal)
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <div class="circle-wrapper mx-auto mb-2" id="{{ $type }}Circle"></div>
                        <h5 class="mt-2 text-capitalize">{{ $type }} Progress</h5>
                        <p id="{{ $type }}CurrentText">
                            @if ($type == 'weight')
                                Current: {{ $goal->current_progress }} kg
                            @elseif ($type == 'workout')
                                {{ $goal->current_progress }} / {{ $goal->target_value }} Workouts
                            @elseif ($type == 'water')
                                {{ $goal->current_progress }} / {{ $goal->target_value }} L
                            @endif
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <hr>

    <h4 class="mt-4">All Goals</h4>
    <a href="{{ route('goals.create') }}" class="btn btn-success mb-3">+ Add New Goal</a>

    {{-- Filter & Sort Form --}}
    <form method="GET" action="{{ route('goals.index') }}" class="row g-2 mb-4">
        <div class="col-md-3">
            <select name="type" class="form-select">
                <option value="">All Types</option>
                @foreach (['weight', 'workout', 'water', 'steps', 'sleep'] as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">All Statuses</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="sort_by" class="form-select">
                <option value="created" {{ request('sort_by') == 'created' ? 'selected' : '' }}>Sort by Created Date</option>
                <option value="deadline" {{ request('sort_by') == 'deadline' ? 'selected' : '' }}>Sort by Deadline</option>
                <option value="progress" {{ request('sort_by') == 'progress' ? 'selected' : '' }}>Sort by Progress</option>
            </select>
        </div>
        <div class="col-md-3 d-flex">
            <button type="submit" class="btn btn-primary me-2 w-100">Apply</button>
            <a href="{{ route('goals.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
    </form>

    {{-- Goals List --}}
    @forelse ($goals as $goal)
        @php
            $percentage = $goal->target_value > 0 ? min(100, round($goal->current_progress / $goal->target_value * 100)) : 0;
            $barColor = match($goal->type) {
                'weight' => 'bg-success',
                'workout' => 'bg-info',
                'water' => 'bg-warning',
                'steps' => 'bg-primary',
                'sleep' => 'bg-dark',
                default => 'bg-secondary'
            };

            $isCompleted = $goal->target_value > 0 && $goal->current_progress >= $goal->target_value;
        @endphp

        <div class="card mb-3 p-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <strong>{{ $goal->title }}</strong> ({{ ucfirst($goal->type) }})<br>
                    Progress: {{ $goal->current_progress }} / {{ $goal->target_value }}
                </div>
                <div class="mt-2 mt-md-0">
                    <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-sm btn-outline-warning me-2">✏️ Edit</a>
                    <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">🗑️ Delete</button>
                    </form>
                </div>
            </div>

            {{-- Horizontal Progress Bar --}}
            <div class="progress mt-2" style="height: 10px;">
                <div class="progress-bar {{ $barColor }}" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            {{-- Timeline & Badges --}}
            @if ($goal->start_date && $goal->end_date)
                @php
                    $start = \Carbon\Carbon::parse($goal->start_date)->startOfDay();
                    $end = \Carbon\Carbon::parse($goal->end_date)->startOfDay();
                    $today = \Carbon\Carbon::today();

                    $daysPassed = $start->diffInDays(min($today, $end));
                    $daysRemaining = $today->lte($end) ? $today->diffInDays($end) : 0;

                    $isOverdue = $today->gt($end) && !$isCompleted;
                    $completedAt = \Carbon\Carbon::parse($goal->updated_at)->startOfDay();
                    $completedLate = $isCompleted && $completedAt->gt($end);
                @endphp

                <div class="mt-3">
                    <small class="text-muted">Timeline: {{ $start->format('d M Y') }} – {{ $end->format('d M Y') }}</small>
                    <div>
                        <small>
                            {{ $daysPassed }} day{{ $daysPassed !== 1 ? 's' : '' }} passed,
                            {{ $daysRemaining }} day{{ $daysRemaining !== 1 ? 's' : '' }} remaining
                        </small>
                    </div>

                    @if ($isCompleted)
                        <span class="badge {{ $completedLate ? 'bg-warning' : 'bg-success' }} mt-2">
                            {{ $completedLate ? '⚠️ Completed late' : '✅ Completed on time' }} ({{ $completedAt->format('d M Y') }})
                        </span>
                    @elseif ($isOverdue)
                        <span class="badge bg-danger mt-2">⏰ Overdue: Goal deadline passed!</span>
                    @endif
                </div>
            @endif

            {{-- Reminders --}}
            @if (!$isCompleted)
                <div class="mt-2">
                    @switch($goal->type)
                        @case('weight') <small class="text-muted">🕒 Reminder: Weigh yourself weekly!</small> @break
                        @case('workout') <small class="text-muted">🏋️ Reminder: Log workouts regularly!</small> @break
                        @case('water') <small class="text-muted">💧 Reminder: Drink water daily!</small> @break
                        @default <small class="text-muted">💡 Stay consistent!</small>
                    @endswitch
                </div>
            @endif
        </div>
    @empty
        <div class="alert alert-info">No goals yet. Add one to get started!</div>
    @endforelse
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>
<script>
    function makeCircle(containerId, percent, color) {
        const el = document.querySelector(containerId);
        if (!el) return;

        new ProgressBar.Circle(containerId, {
            color: color,
            strokeWidth: 8,
            trailWidth: 4,
            trailColor: '#eee',
            easing: 'easeInOut',
            duration: 1400,
            text: {
                value: percent + '%',
                style: {
                    color: '#000',
                    position: 'absolute',
                    left: '50%',
                    top: '50%',
                    transform: 'translate(-50%, -50%)',
                    fontSize: '16px',
                    fontWeight: 'bold',
                }
            }
        }).animate(percent / 100);
    }

    makeCircle('#weightCircle', {{ $progressData['weight'] ?? 0 }}, '#28a745');
    makeCircle('#workoutCircle', {{ $progressData['workout'] ?? 0 }}, '#17a2b8');
    makeCircle('#waterCircle', {{ $progressData['water'] ?? 0 }}, '#fd7e14');
</script>

<style>
.circle-wrapper {
    width: 120px;
    height: 120px;
    position: relative;
}
</style>
@endsection

