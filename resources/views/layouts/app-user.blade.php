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
    <footer class="bg-dark text-light pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">SMK Syafi'i Akrom</h5>
                    <p class="small">
                        Portal resmi informasi kegiatan sekolah.
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">Menu Cepat</h5>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('user') }}" class="text-light text-decoration-none">Kegiatan</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">Ikuti Kami</h5>
                    <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-2">
                        <a href="https://www.facebook.com/smksapekalongan/" class="text-light fs-4" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/smksapekalongan/" class="text-light fs-4" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UChfApbOeJSsKf9piaw3o-Nw" class="text-light fs-4"
                            target="_blank">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="https://www.tiktok.com/@smksyafiiakrom" class="text-light fs-4" target="_blank">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="border-light">
            <div class="text-center small mt-3">
                &copy; 2025 Admin SMK Syafi'i Akrom. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-error');
            if (alert) {
                alert.classList.add('fade');
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 500);
            }
        }, 2000);
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
