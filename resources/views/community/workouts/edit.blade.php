@extends('master.layout')

@section('title', 'Edit Workout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Edit Workout</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('community.workouts.update', $workoutPost) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Workout Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Workout Title*</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title', $workoutPost->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">Description*</label>
                            <textarea class="form-control @error('content') is-invalid @enderror"
                                      id="content" name="content" rows="5" required>{{ old('content', $workoutPost->description) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Difficulty -->
                        <div class="mb-4">
                            <label for="difficulty" class="form-label fw-bold">Difficulty*</label>
                            <select class="form-select @error('difficulty') is-invalid @enderror"
                                    id="difficulty" name="difficulty" required>
                                <option value="">-- Select Difficulty --</option>
                                <option value="beginner" {{ old('difficulty', $workoutPost->difficulty) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="intermediate" {{ old('difficulty', $workoutPost->difficulty) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="advanced" {{ old('difficulty', $workoutPost->difficulty) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                            </select>
                            @error('difficulty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Targeted Muscle Groups (Multi-Select) -->
                        <div class="form-group">
                            <label for="muscle_groups">Targeted Muscle Groups</label>
                            @php
                                $allMuscles = ['Chest', 'Back', 'Legs', 'Arms', 'Shoulders', 'Core'];
                                $selectedMuscles = old('muscle_groups', explode(',', $workoutPost->targeted_muscles));
                            @endphp
                            <select name="muscle_groups[]" id="muscle_groups" class="form-control selectpicker"
                                    multiple data-live-search="true" title="Choose muscle groups..." data-style="btn-outline-primary">
                                @foreach ($allMuscles as $muscle)
                                    <option value="{{ $muscle }}" {{ in_array($muscle, $selectedMuscles) ? 'selected' : '' }}>
                                        {{ $muscle }}
                                    </option>
                                @endforeach
                            </select>
                            @error('muscle_groups')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                        <!-- Upload New Media -->
                        <div class="mb-4">
                            <label for="media" class="form-label fw-bold">Upload New Image (Optional)</label>
                            <input type="file" class="form-control @error('media') is-invalid @enderror"
                                   id="media" name="media" accept="image/*">
                            @error('media')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Current Image -->
                        @if($workoutPost->media_path)
                        <div class="mb-3">
                            <label class="form-label">Current Image</label>
                            <div>
                                <img src="{{ asset('storage/' . $workoutPost->media_path) }}"
                                     alt="Current workout image" class="img-thumbnail" style="max-height: 200px;">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image">
                                    <label class="form-check-label" for="remove_image">
                                        Remove current image
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('community.workouts.show', $workoutPost) }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Update Workout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
