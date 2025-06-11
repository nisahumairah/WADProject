@extends('master.layout')

@section('title', 'Community Discussions')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h4 class="page-title">Community Discussions</h4>
            <p class="text-muted">Join the conversation with our fitness community</p>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('community.discussions.create') }}" class="btn btn-primary">
                <i class="la la-plus"></i> New Topic
            </a>
        </div>
    </div>

    <!-- Example Discussion 1 -->
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="mb-1">
                        <a href="#" class="text-decoration-none">Best Protein Powder for Muscle Gain?</a>
                    </h5>
                    <p class="mb-2 text-muted small">
                        <span class="me-3"><i class="la la-user"></i> Mike Johnson</span>
                        <span class="me-3"><i class="la la-clock"></i> 2 hours ago</span>
                        <span><i class="la la-comment"></i> 14 replies</span>
                    </p>
                </div>
                <span class="badge bg-info">Nutrition</span>
            </div>

            <p class="mb-2">I've been trying different protein powders but can't seem to find one that doesn't upset my stomach while still delivering results. Any recommendations for quality whey protein that's easy to digest?</p>

            <div class="d-flex align-items-center">
                <span class="badge bg-light text-dark me-2">protein</span>
                <span class="badge bg-light text-dark me-2">supplements</span>
                <span class="badge bg-light text-dark">digestion</span>
            </div>
        </div>
    </div>

    <!-- Example Discussion 2 -->
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="mb-1">
                        <a href="#" class="text-decoration-none">Home Workout Routine Without Equipment</a>
                    </h5>
                    <p class="mb-2 text-muted small">
                        <span class="me-3"><i class="la la-user"></i> Sarah Williams</span>
                        <span class="me-3"><i class="la la-clock"></i> 1 day ago</span>
                        <span><i class="la la-comment"></i> 8 replies</span>
                    </p>
                </div>
                <span class="badge bg-success">Workouts</span>
            </div>

            <p class="mb-2">I'll be traveling for a month with no gym access. Looking for effective bodyweight exercises to maintain muscle mass. What's your go-to routine when you can't get to the gym?</p>

            <div class="d-flex align-items-center">
                <span class="badge bg-light text-dark me-2">bodyweight</span>
                <span class="badge bg-light text-dark me-2">travel</span>
                <span class="badge bg-light text-dark">home-workout</span>
            </div>
        </div>
    </div>

    <!-- Example Discussion 3 -->
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="mb-1">
                        <a href="#" class="text-decoration-none">Dealing With Gym Anxiety</a>
                    </h5>
                    <p class="mb-2 text-muted small">
                        <span class="me-3"><i class="la la-user"></i> Alex Chen</span>
                        <span class="me-3"><i class="la la-clock"></i> 3 days ago</span>
                        <span><i class="la la-comment"></i> 22 replies</span>
                    </p>
                </div>
                <span class="badge bg-warning text-dark">Mental Health</span>
            </div>

            <p class="mb-2">As a beginner, I feel intimidated every time I walk into the gym. Does anyone have tips for overcoming this anxiety? How did you get comfortable when you first started?</p>

            <div class="d-flex align-items-center">
                <span class="badge bg-light text-dark me-2">beginner</span>
                <span class="badge bg-light text-dark me-2">confidence</span>
                <span class="badge bg-light text-dark">support</span>
            </div>
        </div>
    </div>

    <!-- Dynamic Discussions from Database -->
    @foreach($topics as $topic)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="mb-1">
                        <a href="{{ route('community.discussions.show', $topic->id) }}" class="text-decoration-none">
                            {{ $topic->title }}
                        </a>
                    </h5>
                    <p class="mb-2 text-muted small">
                        <span class="me-3"><i class="la la-user"></i> {{ $topic->user->name }}</span>
                        <span class="me-3"><i class="la la-clock"></i> {{ $topic->created_at->diffForHumans() }}</span>
                        <span><i class="la la-comment"></i> {{ $topic->replies_count }} replies</span>
                    </p>
                </div>
                @if($topic->category)
                <span class="badge" style="background-color: {{ $topic->category->color ?? '#ccc' }};">
                    {{ $topic->category->name ?? 'General' }}
                </span>
                @endif

            </div>

            <p class="mb-2">{{ Str::limit(strip_tags($topic->content), 200) }}</p>

            {{-- @if($topic->tags->count() > 0)
            <div class="d-flex align-items-center">
                @foreach($topic->tags as $tag)
                <span class="badge bg-light text-dark me-2">{{ $tag->name }}</span>
                @endforeach
            </div>
            @endif --}}
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $topics->links() }}
    </div>
</div>
@endsection
