@extends('master.layout')
@section('title', 'Edit Goal')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">✏️ Edit Goal</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('goals.update', $goal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Goal Title</label>
                        <input type="text" name="title" value="{{ $goal->title }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Goal Type</label>
                        <select name="type" class="form-select" required>
                            <option value="weight" {{ $goal->type == 'weight' ? 'selected' : '' }}>Weight</option>
                            <option value="workout" {{ $goal->type == 'workout' ? 'selected' : '' }}>Workout</option>
                            <option value="water" {{ $goal->type == 'water' ? 'selected' : '' }}>Water</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Target Value</label>
                        <input type="number" step="0.1" name="target_value" value="{{ $goal->target_value }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Progress</label>
                        <input type="number" step="0.1" name="current_progress" value="{{ $goal->current_progress }}" class="form-control">
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" value="{{ $goal->start_date }}" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_date" value="{{ $goal->end_date }}" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('goals.index') }}" class="btn btn-outline-secondary">⬅️ Cancel</a>
                        <button type="submit" class="btn btn-warning">💾 Update Goal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
