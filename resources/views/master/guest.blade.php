<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | FitMuslim GO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet"> <!-- Optional icons -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }
        footer {
            background-color: #fff;
            border-top: 1px solid #dee2e6;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p class="mb-1">&copy; {{ now()->year }} FitMuslim GO. All rights reserved.</p>
            <p class="mb-0">
                <a href="#">Privacy</a> •
                <a href="#">Terms</a> •
                <a href="#">Contact</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
