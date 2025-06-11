@extends('master.layout')

@section('title', 'Create New Discussion')

@section('content')
<div class="container">
    <h4 class="mb-4">Start a New Discussion</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Please fix the following errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('community.discussions.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" rows="6" class="form-control" required>{{ old('content') }}</textarea>
        </div>

        {{-- If you're using tags, you can keep this --}}
        {{--
        <div class="form-group mb-3">
            <label for="tags">Tags (comma separated)</label>
            <input type="text" name="tags" class="form-control" value="{{ old('tags') }}">
        </div>
        --}}

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Post Discussion</button>
        </div>
    </form>
</div>
@endsection
