@extends('layouts.app')

@section('title', 'Workout Sharing')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h4 class="page-title">Workout Sharing</h4>
            <p class="text-muted">Share your fitness journey or workout routine...</p>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('community.workouts.create') }}" class="btn btn-primary">
                <i class="la la-plus"></i> Share Workout
            </a>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('assets/img/profile.jpg') }}" width="40" class="rounded-circle mr-3">
                <div>
                    <h6 class="mb-0">{{ $post->user->name }}</h6>
                    <small class="text-muted">{{ $post->created_at->format('M d, h:i A') }}</small>
                </div>
            </div>

            <h5>{{ $post->title }}</h5>
            <p>{{ $post->description }}</p>

            @if($post->targeted_muscles)
            <div class="mb-3">
                @foreach(explode(',', $post->targeted_muscles) as $muscle)
                <span class="badge badge-info mr-1">{{ ucfirst(trim($muscle)) }}</span>
                @endforeach
                <span class="badge badge-{{ $post->difficulty == 'advanced' ? 'danger' : ($post->difficulty == 'intermediate' ? 'warning' : 'success') }}">
                    {{ ucfirst($post->difficulty) }}
                </span>
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-sm btn-link like-btn" data-post-id="{{ $post->id }}">
                        <i class="la la-heart{{ $post->isLikedBy(auth()->user()) ? '' : '-o' }} text-danger"></i>
                        <span class="like-count">{{ $post->likes->count() }}</span>
                    </button>
                    <a href="{{ route('community.workouts.show', $post->id) }}" class="btn btn-sm btn-link">
                        <i class="la la-comment"></i>
                        <span>{{ $post->comments->count() }}</span>
                    </a>
                </div>
                <button class="btn btn-sm btn-link">
                    <i class="la la-bookmark"></i> Save
                </button>
            </div>
        </div>

        <!-- Comments preview -->
        @if($post->comments->count() > 0)
        <div class="card-footer bg-light">
            @foreach($post->comments->take(2) as $comment)
            <div class="mb-2">
                <div class="d-flex">
                    <img src="{{ asset('assets/img/profile.jpg') }}" width="30" class="rounded-circle mr-2">
                    <div>
                        <h6 class="mb-0">{{ $comment->user->name }}</h6>
                        <p class="mb-0">{{ $comment->content }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach

            @if($post->comments->count() > 2)
            <a href="{{ route('community.workouts.show', $post->id) }}" class="text-primary">
                View all {{ $post->comments->count() }} comments
            </a>
            @endif
        </div>
        @endif
    </div>
    @endforeach

    {{ $posts->links() }}
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.like-btn').click(function() {
        const postId = $(this).data('post-id');
        const btn = $(this);

        $.ajax({
            url: '/community/workouts/' + postId + '/like',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                btn.find('.like-count').text(response.likes);
                btn.find('i').toggleClass('la-heart-o la-heart text-danger');
            }
        });
    });
});
</script>
@endsection
