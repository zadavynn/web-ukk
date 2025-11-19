<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar sticky-top bg-body-secondary ps-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-semibold" href="{{ route('user') }}">SMK Syafi'i Akrom</a>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-secondary text-light pb-1 pt-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2025 Admin SMK Syafi'i Akrom. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        // auto-hide alert
        setTimeout(() => {
            const alert = document.getElementById('alert-error');
            if (alert) {
                alert.classList.add('fade');
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 500);
            }
        }, 2000);

        // carousel
        const sponsorCarousel = document.querySelector('#sponsorCarousel');
        if (sponsorCarousel) {
            new bootstrap.Carousel(sponsorCarousel, {
                interval: 3000,
                ride: 'carousel',
                pause: false,
            });
        }
    </script>
</body>

</html>
