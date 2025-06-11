@extends('layouts.app')

@section('title', 'Community Discussions')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h4 class="page-title">Community Discussions</h4>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('community.discussions.create') }}" class="btn btn-primary">
                        <i class="la la-plus"></i> New Topic
                    </a>
                </div>
            </div>

            @foreach($topics as $topic)
            <div class="card mb-3">
                <div class="card-body">
                    <h5><a href="{{ route('community.discussions.show', $topic->id) }}">{{ $topic->title }}</a></h5>
                    <p class="mb-2">{{ Str::limit($topic->content, 200) }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/profile.jpg') }}" width="30" class="rounded-circle mr-2">
                            <small class="text-muted">
                                {{ $topic->user->name }} • {{ $topic->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <div>
                            <span class="badge badge-light mr-2">
                                <i class="la la-comment"></i> {{ $topic->replies->count() }}
                            </span>
                            <span class="badge badge-light">
                                <i class="la la-eye"></i> {{ $topic->views }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $topics->links() }}
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Popular Discussions</h5>
                </div>
                <div class="card-body">
                    @foreach($popularTopics as $topic)
                    <div class="mb-3">
                        <h6><a href="{{ route('community.discussions.show', $topic->id) }}">{{ $topic->title }}</a></h6>
                        <small class="text-muted">
                            {{ $topic->replies_count }} replies • {{ $topic->views }} views
                        </small>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Members Online</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h4>14%</h4>
                        <p class="text-muted">16 members currently online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
