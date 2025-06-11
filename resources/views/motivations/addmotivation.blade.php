
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

<header>
    <div class="header-container">
        <div class="logo">
            <img src="{{ asset('assets/img/flower.jpeg') }}" alt="Logo">
            <h1 class="sitename">FitMuslim Go</h1>
        </div>
        <nav>
            <ul>
                <li><a href="/motivations" class="{{ request()->is('motivations*') ? 'active' : '' }}">Islamic Motivations</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <div class="form-container">
        <h1>Add Islamic Motivation</h1>
        
        <form action="{{ route('motivations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="quote">Motivational Quote</label>
                <textarea id="quote" name="quote" rows="5" required placeholder="Enter an inspiring Quranic verse or Hadith..."></textarea>
            </div>

            <div class="form-group">
                <label for="source">Source</label>
                <input type="text" id="source" name="source" required placeholder="e.g., Quran 2:286, Sahih Bukhari, etc.">
            </div>

            <div class="form-group">
                <label for="reflection">Reflection</label>
                <textarea id="reflection" name="reflection" rows="4" placeholder="Write your personal reflection..."></textarea>
            </div>

            <div class="form-group">
                <label for="difficulty_level">Difficulty Level</label>
                <select id="difficulty_level" name="difficulty_level" required>
                    <option value="">-- Select Difficulty --</option>
                    <option value="easy">Easy</option>
                    <option value="moderate">Moderate</option>
                    <option value="challenging">Challenging</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category_tag">Category Tag</label>
                <input type="text" id="category_tag" name="category_tag" placeholder="e.g., Patience, Gratitude, Forgiveness">
            </div>

            <div class="form-group">
                <label for="image_url">Upload Image (optional)</label>
                <input type="file" id="image_url" name="image_url" accept="image/*">
            </div>

            @auth
          <input type="hidden" name="author_id" value="{{ auth()->user()->id ?? '' }}">
            @endauth

            <div class="button-group">
                <a href="{{ route('motivations.index') }}" class="btn btn-secondary">← Back to List</a>
                <button type="submit" class="btn btn-primary">Save Motivation</button>
            </div>
        </form>
    </div>
</div>

<footer>
    <div class="footer-content">
        <div class="copyright">
            © Copyright <strong>FitMuslim Go</strong> All Rights Reserved
        </div>
        <div class="social-links">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>

