@extends('master.layout')

@section('title', $post->title)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $post->title }}</h4>
                    <span class="badge badge-{{ $post->difficulty == 'advanced' ? 'danger' : ($post->difficulty == 'intermediate' ? 'warning' : 'success') }}">
                        {{ ucfirst($post->difficulty) }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('assets/img/user-icon.png') }}" width="40" class="rounded-circle mr-3">
                        <div>
                            <h6 class="mb-0">{{ $post->user->name }}</h6>
                            <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>

                    @if($post->targeted_muscles)
                    <div class="mb-3">
                        @foreach(explode(',', $post->targeted_muscles) as $muscle)
                        <span class="badge badge-info mr-1">{{ ucfirst(trim($muscle)) }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div class="workout-content mb-4">
                        {!! nl2br(e($post->description)) !!}
                    </div>

                    @if($post->media_path)
                    <div class="workout-media mb-4">
                        <img src="{{ asset('storage/'.$post->media_path) }}" class="img-fluid rounded">
                    </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="like-section">
                            <form action="{{ route('community.workouts.like', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                                <button type="submit" class="btn btn-sm btn-link text-danger">
                                <i class="la la-heart{{ $post->isLikedBy(auth()->user()) ? '' : '-o' }}"></i>
                                <span class="like-count">{{ $post->likes->count() }}</span> Likes
                                </button>
                            </form>
                        </div>
                        <div>
                            <span class="text-muted">
                                <i class="la la-comment"></i> {{ $post->comments->count() }} Comments
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Comments</h5>
                </div>
                <div class="card-body">
                    @if($post->comments->count() > 0)
                        @foreach($post->comments as $comment)
                        <div class="media mb-4">
                            <img src="{{ asset('assets/img/user-icon.png') }}" width="40" class="rounded-circle mr-3">
                            <div class="media-body">
                                <h6 class="mt-0">{{ $comment->user->name }}</h6>
                                <p>{{ $comment->content }}</p>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>No comments yet. Be the first to comment!</p>
                    @endif

                    <!-- Comment Form -->
                    @auth
                    <div class="mt-4">
                        <form action="{{ route('community.workouts.comments.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3" placeholder="Add a comment..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
                        </form>
                    </div>
                    @else
                    <div class="alert alert-info">
                        Please <a href="{{ route('login') }}">login</a> to leave a comment.
                    </div>
                    @endauth
                </div>
                @auth
                    @if (auth()->id() === $post->user_id)
                        <a href="{{ route('community.workouts.edit', $post) }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('community.workouts.destroy', $post) }}" method="POST" class="d-inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this workout?');">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger ms-2">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    @endif

                @endauth
                <div class="card-footer bg-transparent">
                    <a href="{{ route('community.workouts.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Workouts
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
