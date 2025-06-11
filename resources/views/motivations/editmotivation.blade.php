<style>
    /* Base Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Header Styles */
    header {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        color: white;
        padding: 1rem 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logo img {
        height: 40px;
        border-radius: 50%;
    }

    .sitename {
        font-size: 1.5rem;
        font-weight: 700;
    }

    nav ul {
        display: flex;
        gap: 1.5rem;
        list-style: none;
    }

    nav a {
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.5rem 0;
        border-bottom: 2px solid transparent;
    }

    nav a:hover, nav a.active {
        border-bottom: 2px solid #f1c40f;
    }

    .container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .form-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        padding: 2rem;
        margin-top: 2rem;
    }

    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    h1:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: #3498db;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2c3e50;
    }

    input, textarea, select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    input:focus, textarea:focus, select:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        outline: none;
    }

    textarea {
        min-height: 150px;
    }

    .button-group {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-primary {
        background: #3498db;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background: #2980b9;
    }

    .btn-secondary {
        background: white;
        color: #2c3e50;
        border: 1px solid #ddd;
    }

    .btn-secondary:hover {
        background: #f8f9fa;
    }

    footer {
        background: #2c3e50;
        color: white;
        padding: 2rem;
        text-align: center;
        margin-top: 3rem;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .copyright {
        margin-bottom: 1rem;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .social-links a {
        color: white;
        font-size: 1.25rem;
    }

    .credits {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.7);
    }
</style>
<div class="container py-5">
    <h2>Edit Motivation</h2>

    <form action="{{ route('motivations.update', $motivation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Quote -->
        <div class="mb-3">
            <label for="quote" class="form-label">Quote</label>
            <input type="text" name="quote" class="form-control" value="{{ old('quote', $motivation->quote) }}" required>
        </div>

        <!-- Source -->
        <div class="mb-3">
            <label for="source" class="form-label">Source</label>
            <input type="text" name="source" class="form-control" value="{{ old('source', $motivation->source) }}" required>
        </div>

        <!-- Reflection -->
        <div class="mb-3">
            <label for="reflection" class="form-label">Reflection (optional)</label>
            <textarea name="reflection" class="form-control">{{ old('reflection', $motivation->reflection) }}</textarea>
        </div>

        <!-- Difficulty Level -->
        <div class="mb-3">
            <label for="difficulty_level" class="form-label">Difficulty Level</label>
            <select name="difficulty_level" class="form-select" required>
                <option value="easy" {{ $motivation->difficulty_level == 'easy' ? 'selected' : '' }}>Easy</option>
                <option value="moderate" {{ $motivation->difficulty_level == 'moderate' ? 'selected' : '' }}>Moderate</option>
                <option value="challenging" {{ $motivation->difficulty_level == 'challenging' ? 'selected' : '' }}>Challenging</option>
            </select>
        </div>

        <!-- Category Tag -->
        <div class="mb-3">
            <label for="category_tag" class="form-label">Category Tag</label>
            <input type="text" name="category_tag" class="form-control" value="{{ old('category_tag', $motivation->category_tag) }}">
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image_url" class="form-label">Image (optional)</label>
            <input type="file" name="image_url" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Motivation</button>
    </form>
</div>

