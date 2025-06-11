@extends('master.layout')

@section('title', 'Add New Goal')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">🎯 Create New Goal</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('goals.store') }}" method="POST">
                    @csrf

                    {{-- Goal Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Goal Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    {{-- Goal Type (Customizable) --}}
                    <div class="mb-3">
                        <label for="type" class="form-label">Goal Type</label>
                        <input list="goalTypes" name="type" class="form-control" placeholder="e.g. weight, prayer, sleep" required>
                        <datalist id="goalTypes">
                            <option value="weight">
                            <option value="workout">
                            <option value="water">
                            <option value="sleep">
                            <option value="prayer">
                            <option value="reading">
                            <option value="steps">
                        </datalist>
                        <small class="text-muted">Select a common goal type or type your own</small>
                    </div>

                    {{-- Target Value --}}
                    <div class="mb-3">
                        <label for="target_value" class="form-label">Target Value</label>
                        <input type="number" step="0.1" name="target_value" class="form-control" required>
                    </div>

                    {{-- Current Progress --}}
                    <div class="mb-3">
                        <label for="current_progress" class="form-label">Current Progress (optional)</label>
                        <input type="number" step="0.1" name="current_progress" class="form-control">
                    </div>

                    {{-- Start and End Date --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('goals.index') }}" class="btn btn-outline-secondary">⬅️ Cancel</a>
                        <button type="submit" class="btn btn-success">✅ Save Goal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
