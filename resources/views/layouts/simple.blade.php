{{-- resources/views/layouts/simple.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitMuslim GO - Nutrition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Optional custom font / styling --}}
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
