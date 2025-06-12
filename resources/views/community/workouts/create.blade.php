@extends('master.layout')

@section('title', 'Share Workout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Share Your Workout</h4>
                </div>
                <div class="card-body">
                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('community.workouts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="form-group">
                            <label for="title">Workout Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        {{-- Content / Description --}}
                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                        </div>

                        {{-- Difficulty --}}
                        <div class="form-group">
                            <label for="difficulty">Difficulty</label>
                            <select name="difficulty" id="difficulty" class="form-control" required>
                                <option value="">Select Difficulty</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                        </div>

                        {{-- Muscle Groups (Multi-Select) --}}
                        <div class="form-group">
                            <label for="muscle_groups">Targeted Muscle Groups</label>
                            <select name="muscle_groups[]" id="muscle_groups" class="form-control selectpicker" multiple data-live-search="true" title="Choose muscle groups..." data-style="btn-outline-primary">
                                <option value="Chest">Chest</option>
                                <option value="Back">Back</option>
                                <option value="Legs">Legs</option>
                                <option value="Arms">Arms</option>
                                <option value="Shoulders">Shoulders</option>
                                <option value="Core">Core</option>
                            </select>
                            @error('muscle_groups')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Media Upload --}}
                        <div class="form-group">
                            <label for="media">Optional Image Upload</label>
                            <input type="file" name="media" id="media" class="form-control-file">
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary mt-3">Post Workout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
