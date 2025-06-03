<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title') | Kaiadmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('assets/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

    @stack('styles') <!-- For page-specific CSS -->
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      @include('layout.partials.sidebar') <!-- Extract sidebar to separate file -->
      <!-- End Sidebar -->

      <div class="main-panel">
        <!-- Header -->
        @include('layout.partials.header') <!-- Extract header to separate file -->
        <!-- End Header -->

        <!-- Main Content -->
        <div class="container">
          @yield('content') <!-- Dynamic content goes here -->
        </div>
        <!-- End Main Content -->

        <!-- Footer -->
        @include('layout.partials.footer') <!-- Extract footer to separate file -->
        <!-- End Footer -->
      </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- Plugin Scripts -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

    @stack('scripts') <!-- For page-specific JS -->
    <script>
       $(document).ready(function() {
       // Initialize charts
       $('#statisticsChart').sparkline([...]);
      });
    </script>
  </body>
</html>
