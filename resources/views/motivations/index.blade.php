@extends('master.layout')
@section('title', 'Daily Motivations')

@section('styles')
<style>
    /* Main Styles */
.motivations-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Header Styles */
.motivations-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.motivations-title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.motivations-subtitle {
    color: #666;
    font-size: 16px;
}

/* Hadith of the Day */
.hadith-card {
    background-color: #f0fdf4;
    border-left: 4px solid #10b981;
    padding: 25px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.hadith-title {
    font-size: 20px;
    font-weight: 600;
    color: #065f46;
    margin-bottom: 15px;
}

.hadith-quote {
    font-size: 18px;
    font-style: italic;
    color: #374151;
    margin-bottom: 15px;
    line-height: 1.6;
}

.hadith-source {
    font-size: 14px;
    color: #065f46;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.new-badge {
    background-color: #d1fae5;
    color: #065f46;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 500;
}

/* Categories Grid */
.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 30px;
}

.category-card {
    background: white;
    border: 1px solid #e5e7eb;
    padding: 15px;
    border-radius: 8px;
}

.category-title {
    font-size: 18px;
    font-weight: 500;
    color: #333;
    margin-bottom: 5px;
}

.category-count {
    font-size: 14px;
    color: #6b7280;
}

/* Motivation Cards */
.motivation-card {
    background: white;
    border: 1px solid #e5e7eb;
    padding: 25px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.motivation-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 10px;
}

.motivation-quote {
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.motivation-time {
    background-color: #e0f2fe;
    color: #0369a1;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 500;
}

.motivation-description {
    color: #4b5563;
    margin-bottom: 15px;
    line-height: 1.5;
}

.motivation-image {
    width: 100%;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Tags */
.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 15px;
}

.tag {
    background-color: #f3f4f6;
    color: #374151;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
}

/* Actions */
.actions-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #e5e7eb;
    padding-top: 15px;
}

.source-text {
    font-size: 14px;
    color: #6b7280;
}

.action-buttons {
    display: flex;
    gap: 20px;
}

.action-button {
    display: flex;
    align-items: center;
    font-size: 14px;
    cursor: pointer;
}

.like-button {
    color: #ef4444;
}

.bookmark-button {
    color: #3b82f6;
}

.action-button svg {
    margin-right: 5px;
    width: 16px;
    height: 16px;
}

/* Create Button */
.create-button {
    background-color: #10b981;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    transition: background-color 0.2s;
}

.create-button:hover {
    background-color: #059669;
}

.create-button svg {
    margin-right: 8px;
    width: 18px;
    height: 18px;
}
</style>
@endsection

@section('content')

<div class="motivations-container">
    <!-- Header with Create Button -->
    <div class="motivations-header">
        <div>
            <h1 class="motivations-title">Daily Motivations</h1>
            <p class="motivations-subtitle">Find inspiration for your spiritual and physical journey</p>
        </div>
        <a href="{{ route('motivations.create') }}" class="create-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Create Motivation
        </a>
    </div>

    <!-- Hadith of the Day Section -->
    <div class="hadith-card">
        <h2 class="hadith-title">HADITH OF THE DAY</h2>
        <blockquote class="hadith-quote">
            "A strong believer is better and more beloved to Allah than a weak believer, although both are good. Strive for that which will benefit you, seek the help of Allah, and do not feel helpless."
        </blockquote>
        <div class="hadith-source">
            <span>Source: Sahih Muslim</span>
            <span class="new-badge">New</span>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="categories-grid">
        <div class="category-card">
            <h3 class="category-title">Health & Well-being</h3>
            <p class="category-count">15 hadiths in collection</p>
        </div>
        <div class="category-card">
            <h3 class="category-title">Nutrition & Diet</h3>
            <p class="category-count">12 hadiths in collection</p>
        </div>
        <div class="category-card">
            <h3 class="category-title">Exercise & Activity</h3>
            <p class="category-count">9 hadiths in collection</p>
        </div>
        <div class="category-card">
            <h3 class="category-title">Motivation & Discipline</h3>
            <p class="category-count">18 hadiths in collection</p>
        </div>
    </div>

    <!-- Motivations List -->
    <h2 style="font-size: 22px; font-weight: 600; margin-bottom: 20px; color: #333;">Recently Added</h2>

    @foreach ($motivations as $motivation)
        <div class="motivation-card">
            <div class="motivation-header">
                <h3 class="motivation-quote">{{ $motivation->quote }}</h3>
                <span class="motivation-time">Added {{ $motivation->created_at->diffForHumans() }}</span>
            </div>

            <p class="motivation-description">{{ $motivation->description }}</p>

            @if($motivation->image)
                <img src="{{ asset('storage/' . $motivation->image) }}" alt="Motivation Image" class="motivation-image">
            @endif

            <!-- Tags -->
            <div class="tags-container">
                <span class="tag">{{ ucfirst($motivation->difficulty) }}</span>
                <span class="tag">{{ $motivation->category }}</span>
                @if($motivation->tags)
                    @foreach(explode(',', $motivation->tags) as $tag)
                        <span class="tag">{{ trim($tag) }}</span>
                    @endforeach
                @endif
            </div>

            <!-- Actions -->
            <div class="action-buttons">
    {{-- Like Button --}}
    <form method="POST" action="{{ route('motivations.like', $motivation) }}">
        @csrf
        <button type="submit" class="action-button like-button">
            <!-- Like SVG -->
            @auth
                {{ auth()->user()->likedMotivations->contains($motivation->id) ? 'Unlike' : 'Like' }}
            @endauth
        </button>
    </form>

    {{-- Bookmark Button --}}
    <form method="POST" action="{{ route('motivations.bookmark', $motivation) }}">
        @csrf
        <button type="submit" class="action-button bookmark-button">
            <!-- Bookmark SVG -->
            @auth
                {{ auth()->user()->bookmarkedMotivations->contains($motivation->id) ? 'Unbookmark' : 'Bookmark' }}
            @endauth
        </button>
    </form>

    {{-- Edit & Delete Buttons: Only show to post owner --}}
    @if($motivation->user_id === auth()->id())
        <a href="{{ route('motivations.edit', $motivation->id) }}" class="action-button edit-button">
            ✏️ Edit
        </a>
    @endif
</div>
        </div>
    @endforeach
</div>

@endsection
