@extends('master.layout')
@section('title', 'Create Motivation')

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

    .submit-btn {
        background: #10b981;
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s;
        display: block;
        width: 100%;
    }

    .submit-btn:hover {
        background: #059669;
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
    <h1 class="creation-title">Create New Motivation</h1>

    <form method="POST" action="{{ route('motivations.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Quote:</label>
            <input type="text" name="quote" class="form-input" required
                   placeholder="Enter an inspiring quote...">
        </div>

        <div class="form-group">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-input"
                     placeholder="Add your explanation or reflection..."></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Category:</label>
            <select name="category" class="form-input" required>
                <option value="">Select a category</option>
                <option value="Health & Well-being">Health & Well-being</option>
                <option value="Nutrition & Diet">Nutrition & Diet</option>
                <option value="Exercise & Activity">Exercise & Activity</option>
                <option value="Motivation & Discipline">Motivation & Discipline</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Tags (comma separated):</label>
            <input type="text" name="tags" class="form-input"
                   placeholder="e.g., consistency, faith, perseverance">
        </div>

        <div class="form-group">
            <label class="form-label">Source:</label>
            <input type="text" name="source" class="form-input"
                   placeholder="e.g., Sahih Bukhari, Book 2, Hadith 45">
        </div>

        <div class="form-group">
            <label class="form-label">Image:</label>
            <input type="file" name="image" class="form-input file-input">
        </div>

        <button type="submit" class="submit-btn">Post Motivation</button>
    </form>
</div>
@endsection
