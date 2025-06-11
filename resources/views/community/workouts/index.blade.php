@extends('master.layout')

@section('title', 'Workout Posts')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h4 class="page-title">Workout Posts</h4>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('community.workouts.create') }}" class="btn btn-primary">
                <i class="la la-plus"></i> Share Workout
            </a>
        </div>
    </div>

    <!-- Example Post 1 -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Full Body HIIT Blast</h5>
                <span class="badge bg-success">Beginner</span>
            </div>

            <div class="d-flex mb-3">
                <div class="me-3">
                    <i class="la la-clock"></i> 30 mins
                </div>
                <div class="me-3">
                    <i class="la la-fire"></i> HIIT
                </div>
                <div>
                    <i class="la la-user"></i> Posted by Alex Johnson
                </div>
            </div>

            <p class="card-text">A perfect 30-minute high intensity interval training workout that targets all major muscle groups. No equipment needed!</p>

            <div class="mb-3">
                <strong>Exercises:</strong> Jump squats, Push-ups, Mountain climbers, Burpees, Plank jacks
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted"><i class="la la-calendar"></i> 2 days ago</span>
                </div>
                <div>
                    <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                    <button class="btn btn-sm btn-outline-success">
                        <i class="la la-thumbs-up"></i> 24
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Example Post 2 -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Upper Body Strength Builder</h5>
                <span class="badge bg-warning text-dark">Intermediate</span>
            </div>

            <div class="d-flex mb-3">
                <div class="me-3">
                    <i class="la la-clock"></i> 45 mins
                </div>
                <div class="me-3">
                    <i class="la la-dumbbell"></i> Strength
                </div>
                <div>
                    <i class="la la-user"></i> Posted by Sarah Miller
                </div>
            </div>

            <p class="card-text">This gym-based workout focuses on building upper body strength with compound movements and progressive overload.</p>

            <div class="mb-3">
                <strong>Exercises:</strong> Bench press, Pull-ups, Shoulder press, Barbell rows, Bicep curls
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted"><i class="la la-calendar"></i> 1 week ago</span>
                </div>
                <div>
                    <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                    <button class="btn btn-sm btn-outline-success">
                        <i class="la la-thumbs-up"></i> 42
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Posts from Database -->
    @foreach($posts as $post)
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">{{ $post->title }}</h5>
                <span class="badge
                    @if($post->difficulty == 'beginner') bg-success
                    @elseif($post->difficulty == 'intermediate') bg-warning text-dark
                    @else bg-danger
                    @endif">
                    {{ ucfirst($post->difficulty) }}
                </span>
            </div>

            <div class="d-flex mb-3">
                <div class="me-3">
                    <i class="la la-clock"></i> {{ $post->duration }} mins
                </div>
                <div class="me-3">
                    <i class="la
                        @if($post->type == 'hiit') la-fire
                        @elseif($post->type == 'strength') la-dumbbell
                        @elseif($post->type == 'cardio') la-running
                        @elseif($post->type == 'yoga') la-spa
                        @else la-heartbeat
                        @endif">
                    </i> {{ ucfirst($post->type) }}
                </div>
                <div>
                    <i class="la la-user"></i> Posted by {{ $post->user->name }}
                </div>
            </div>

            <p class="card-text">{{ $post->description }}</p>

            @if($post->exercises)
            <div class="mb-3">
                <strong>Exercises:</strong> {{ $post->exercises }}
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted"><i class="la la-calendar"></i> {{ $post->created_at->diffForHumans() }}</span>
                </div>
                <div>
                    <a href="{{ route('community.workouts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                    <button class="btn btn-sm btn-outline-success">
                        <i class="la la-thumbs-up"></i> {{ $post->likes_count ?? 0 }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
