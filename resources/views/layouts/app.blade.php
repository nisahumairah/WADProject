<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitMuslim GO</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 200px;
            background-color: #ffffff;
            border-right: 1px solid #ddd;
            padding: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .nav {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            margin-bottom: 15px;
        }

        .nav-item a {
            text-decoration: none;
            color: #333;
            display: flex;
            justify-content: space-between;
            font-weight: 500;
        }

        .nav-item a:hover {
            color: #ff7f50;
        }

        .badge {
            background-color: #eee;
            color: #333;
            border-radius: 12px;
            padding: 2px 8px;
            font-size: 12px;
        }

        .main-content {
            margin-left: 240px;
            padding: 30px;
            flex-grow: 1;
            overflow-y: auto;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
    <h3>FitMuslim GO</h3>
    <ul class="nav">
        <li class="nav-item"><a href="{{ route('dashboard') }}">Dashboard <span class="badge">5</span></a></li>
        <li class="nav-item"><a href="#">Components <span class="badge">14</span></a></li>
         <li class="nav-item"><a href="{{ route('nutrition') }}">Nutrition <span class="badge">5</span></a></li>
        <li class="nav-item"><a href="#">Tables <span class="badge">6</span></a></li>
        <li class="nav-item"><a href="#">Notifications <span class="badge">3</span></a></li>
        <li class="nav-item"><a href="#">Typography <span class="badge">25</span></a></li>
        <li class="nav-item"><a href="#">Icons</a></li>
    </ul>
</nav>


    <!-- Main Content -->
   <main class="main-content" id="main-content">
    @include('dashboard') {{-- or @include('partials.dashboard') if it's in partials --}}
</main>

<!-- Scripts (ideally placed before </body>) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Delegated click handler
        $(document).on('click', 'a[data-load="nutrition"]', function (e) {
            e.preventDefault();
            console.log("Nutrition link clicked"); // Helps confirm it worked

            $.get("{{ route('nutrition.load') }}", function (data) {
                $('#main-content').html(data);
            }).fail(function (xhr) {
                console.error("Error loading nutrition planner:", xhr.responseText);
            });
        });
    });
</script>
<style>
#carouselExampleControls .carousel-inner {
  min-height: 80px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.carousel-control-prev,
.carousel-control-next {
  width: 8%;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 50%;
  top: 35%;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  filter: invert(0.5);
}

</style>

</body>
</html>




