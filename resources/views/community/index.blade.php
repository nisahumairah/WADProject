@extends('master.layout')

@section('title', 'Community')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Community</h1>

    {{-- Navigation Tabs --}}
    <ul class="nav nav-pills nav-justified mb-4" id="communityTabs">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('community.workouts') ? 'active' : '' }}"
            href="{{ route('community.workouts.index') }}">
            <i class="la la-dumbbell"></i> Workout Post
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('community.discussions') ? 'active' : '' }}"
                href="{{ route('community.discussions.index') }}">
            <i class="la la-comments"></i> Forum / Discussion
            </a>
        </li>
    </ul>


    <div class="row">
        {{-- Trending Discussions --}}
        <div class="col-md-6">
            <h3>Trending Discussions</h3>
            <ul class="list-group">
                @forelse($trendingTopics as $topic)
                    <li class="list-group-item">
                        <a href="{{ route('community.discussions.show', $topic->id) }}">
                            {{ $topic->title }}
                        </a>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No trending discussions available.</li>
                @endforelse
            </ul>
        </div>

        {{-- Popular Routines --}}
        <div class="col-md-6">
            <h3>Popular Routines</h3>
            <ul class="list-group">
                @forelse($popularWorkouts as $workout)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('community.workouts.show', $workout->id) }}">
                            {{ $workout->title }}
                        </a>
                        <span class="badge badge-primary badge-pill">{{ $workout->likes_count }} Likes</span>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No popular workouts yet.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
