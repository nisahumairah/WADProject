@extends('master.layout')
@section('title', 'Edit Motivation')

@section('styles')
<style>
    .creation-container {
        max-width: 700px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .creation-title {
        font-size: 1.8rem;
        color: #065f46;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #374151;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        font-size: 1rem;
    }

    .form-input:focus {
        border-color: #10b981;
        outline: none;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    textarea.form-input {
        min-height: 120px;
        resize: vertical;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .submit-btn {
        background: #10b981;
        color: white;
    }

    .submit-btn:hover {
        background: #059669;
    }

    .delete-btn {
        background: #ef4444;
        color: white;
    }

    .delete-btn:hover {
        background: #dc2626;
    }

    .button-group {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .current-image {
        margin-top: 1rem;
        max-width: 200px;
        border-radius: 6px;
    }

    .file-input {
        padding: 0.5rem;
    }

    .file-input::-webkit-file-upload-button {
        background: #e5e7eb;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="creation-container">
    <h1 class="creation-title">Edit Motivation</h1>

    <form method="POST" action="{{ route('motivations.update', $motivation->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Quote:</label>
            <input type="text" name="quote" class="form-input" required
                   value="{{ old('quote', $motivation->quote) }}"
                   placeholder="Enter an inspiring quote...">
        </div>

        <div class="form-group">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-input"
                     placeholder="Add your explanation or reflection...">{{ old('description', $motivation->description) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Category:</label>
            <select name="category" class="form-input" required>
                <option value="">Select a category</option>
                <option value="Health & Well-being" {{ old('category', $motivation->category) == 'Health & Well-being' ? 'selected' : '' }}>Health & Well-being</option>
                <option value="Nutrition & Diet" {{ old('category', $motivation->category) == 'Nutrition & Diet' ? 'selected' : '' }}>Nutrition & Diet</option>
                <option value="Exercise & Activity" {{ old('category', $motivation->category) == 'Exercise & Activity' ? 'selected' : '' }}>Exercise & Activity</option>
                <option value="Motivation & Discipline" {{ old('category', $motivation->category) == 'Motivation & Discipline' ? 'selected' : '' }}>Motivation & Discipline</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Tags (comma separated):</label>
            <input type="text" name="tags" class="form-input"
                   value="{{ old('tags', $motivation->tags) }}"
                   placeholder="e.g., consistency, faith, perseverance">
        </div>

        <div class="form-group">
            <label class="form-label">Source:</label>
            <input type="text" name="source" class="form-input"
                   value="{{ old('source', $motivation->source) }}"
                   placeholder="e.g., Sahih Bukhari, Book 2, Hadith 45">
        </div>

        <div class="form-group">
            <label class="form-label">Image:</label>
            <input type="file" name="image" class="form-input file-input">
            @if($motivation->image)
                <div>
                    <span class="form-label">Current Image:</span>
                    <img src="{{ asset('storage/' . $motivation->image) }}" alt="Current motivation image" class="current-image">
                </div>
            @endif
        </div>

        <div class="button-group">
            <button type="submit" class="btn submit-btn">Update Motivation</button>

            <button type="button" class="btn delete-btn" onclick="confirmDelete()">Delete Motivation</button>
        </div>
    </form>

    <form id="delete-form" method="POST" action="{{ route('motivations.destroy', $motivation->id) }}" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this motivation? This action cannot be undone.')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</div>
@endsection
