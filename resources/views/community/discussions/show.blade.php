@extends('master.layout')

@section('title', $topic->title)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Topic Details -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $topic->title }}</h4>
                    @if($topic->user_id == auth()->id())
                    <div class="dropdown">
                        <button class="btn btn-sm btn-link dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="la la-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <form method="POST" action="{{ route('community.discussions.destroy', $topic->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('assets/img/user-icon.png') }}" width="40" class="rounded-circle mr-3">
                        <div>
                            <h6 class="mb-0">{{ $topic->user->name }}</h6>
                            <small class="text-muted">{{ $topic->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>

                    <div class="topic-content mb-4">
                        {!! nl2br(e($topic->content)) !!}
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted">
                                <i class="la la-eye"></i> {{ $topic->views }} views
                            </span>
                        </div>
                        <div>
                            <span class="text-muted">
                                <i class="la la-comment"></i> {{ $topic->replies->count() }} replies
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Replies Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Replies</h5>
                </div>
                <div class="card-body">
                    @if($topic->replies->count() > 0)
                        @foreach($topic->replies as $reply)
                        <div class="media mb-4 {{ $reply->is_helpful ? 'border-left border-success pl-3' : '' }}">
                            <img src="{{ asset('assets/img/user-icon.png') }}" width="40" class="rounded-circle mr-3">
                            <div class="media-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mt-0">{{ $reply->user->name }}</h6>
                                    @if($topic->user_id == auth()->id() && !$reply->is_helpful)
                                    <form action="{{ route('community.discussions.replies.mark-helpful', $reply->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            Mark as Helpful
                                        </button>
                                    </form>
                                    @elseif($reply->is_helpful)
                                    <span class="badge badge-success">
                                        <i class="la la-check"></i> Helpful Reply
                                    </span>
                                    @endif
                                </div>
                                <p>{{ $reply->content }}</p>
                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>

                                <!-- Like Button for Replies -->
                                <div class="mt-2">
                                    <form action="{{ route('community.comments.like', $reply->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-link text-danger">
                                            <i class="la la-heart{{ $reply->isLikedBy(auth()->user()) ? '' : '-o' }}"></i>
                                            <span class="like-count">{{ $reply->likes->count() }}</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>No replies yet. Be the first to reply!</p>
                    @endif

                    <!-- Reply Form -->
                    @auth
                    <div class="mt-4">
                        <h6>Post a Reply</h6>
                        <form action="{{ route('community.discussions.comments.store', $topic->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3" placeholder="Your reply..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Reply</button>
                        </form>
                    </div>
                    @else
                    <div class="alert alert-info">
                        Please <a href="{{ route('login') }}">login</a> to participate in the discussion.
                    </div>
                    @endauth
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('community.discussions.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Discussions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
