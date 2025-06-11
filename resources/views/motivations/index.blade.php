@extends('master.layout')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <h1 class="text-center mb-5">Islamic Motivations</h1>

            <!-- Add New Motivation button -->
            <div class="text-center mb-4">
                <a href="{{ route('motivations.create') }}" class="btn btn-primary">
                    Add New Motivation
                </a>
            </div>

            <!-- Motivation Cards -->
            @foreach($motivations as $motivation)
            <div class="card mb-4 position-relative px-3 py-3" data-aos="fade-up">
                <!-- Edit Button -->
                <div class="position-absolute" style="top: 10px; right: 60px;">
                    <a href="{{ route('motivations.edit', $motivation->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>

                <!-- Delete Button -->
                <form action="{{ route('motivations.destroy', $motivation->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this motivation?');"
                      style="position: absolute; top: 10px; right: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>

                <div class="card-body">
                    {{-- Quote --}}
                    <blockquote class="blockquote mb-2">
                        <p>"{{ $motivation->quote }}"</p>
                        <footer class="blockquote-footer">{{ $motivation->source }}</footer>
                    </blockquote>

                    {{-- Reflection --}}
                    @if($motivation->reflection)
                        <p><strong>Reflection:</strong> {{ $motivation->reflection }}</p>
                    @endif

                    {{-- Image --}}
                    @if($motivation->image_url)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $motivation->image_url) }}" alt="Motivation Image" class="img-fluid rounded">
                        </div>
                    @endif

                    {{-- Difficulty Level --}}
                    <p><strong>Difficulty:</strong> {{ ucfirst($motivation->difficulty_level) }}</p>

                    {{-- Category Tag --}}
                    <p><strong>Category:</strong> {{ $motivation->category_tag }}</p>

                    {{-- 👍 Like Button --}}
                    <form action="{{ route('motivations.like', $motivation->id) }}" method="POST" class="mt-3 d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary">
                            ❤️ {{ $motivation->likes_count ?? 0 }} Like{{ ($motivation->likes_count ?? 0) !== 1 ? 's' : '' }}
                        </button>
                    </form>

                    {{-- 🔗 Share Buttons --}}
                    @php
                        $postUrl = urlencode(route('motivations.show', $motivation->id));
                        $postText = urlencode($motivation->quote);
                    @endphp
                    <div class="mt-3 d-inline-block">
                        <span class="me-2"><strong>Share:</strong></span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $postUrl }}" target="_blank" class="btn btn-sm btn-outline-secondary me-1">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ $postText }}&url={{ $postUrl }}" target="_blank" class="btn btn-sm btn-outline-info me-1">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ $postText }}%20{{ $postUrl }}" target="_blank" class="btn btn-sm btn-outline-success">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
