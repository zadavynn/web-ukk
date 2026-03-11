<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/datatables.min.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                Admin Dashboard
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row" style="margin-top:56px;">
            <aside
                class="col-md-3 col-lg-2 bg-dark text-white vh-100 position-fixed top-0 start-0 pt-5 d-flex flex-column">
                <ul class="list-group list-group-flush mt-3 flex-grow-1">
                    <li class="list-group-item bg-dark border-0">
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-white text-decoration-none d-block py-2 px-2">
                            <i class="bi bi-house me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="list-group-item bg-dark border-0">
                        <a href="{{ route('kegiatan.index') }}"
                            class="text-white text-decoration-none d-block py-2 px-2">
                            <i class="bi bi-card-list me-2"></i> Kegiatan
                        </a>
                    </li>
                    <li class="list-group-item bg-dark border-0">
                        <a href="{{ route('panitia.index') }}"
                            class="text-white text-decoration-none d-block py-2 px-2">
                            <i class="bi bi-person-badge me-2"></i> Panitia
                        </a>
                    </li>
                    <li class="list-group-item bg-dark border-0">
                        <a href="{{ route('absensi.index') }}"
                            class="text-white text-decoration-none d-block py-2 px-2">
                            <i class="bi bi-person-lines-fill me-2"></i> Absensi
                        </a>
                    </li>
                    <li class="list-group-item bg-dark border-0">
                        <a href="{{ route('sponsor.index') }}"
                            class="text-white text-decoration-none d-block py-2 px-2">
                            <i class="bi bi-cash me-2"></i> Sponsor
                        </a>
                    </li>
                    <li class="list-group-item bg-dark border-0">
                        <a href="{{ route('catatan.index') }}"
                            class="text-white text-decoration-none d-block py-2 px-2">
                            <i class="bi bi-clipboard me-2"></i> Catatan
                        </a>
                    </li>
                </ul>
                <div class="p-3 mt-auto">
                    <a href="{{ route('admin.logout') }}"
                        class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-arrow-right me-2"></i> Keluar
                    </a>
                </div>
            </aside>
            <main class="col-md-9 col-lg-10 ms-auto p-4">
                @yield('content')
            </main>
        </div>
    </div>
    <footer class="bg-dark text-white text-end pe-3 py-3 mt-auto">
        &copy; 2025 Admin SMK Syafi'i Akrom. All rights reserved.
    </footer>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/js/datatables.min.js') }}"></script>
    <script>
        $(function() {
            setTimeout(() => $('.alert').fadeOut('slow'), 3000);
            $("#example").DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    zeroRecords: "Data tidak ditemukan 😅",
                    emptyTable: "Belum ada data",
                    paginate: {
                        first: "‹‹",
                        last: "››",
                        next: "›",
                        previous: "‹"
                    },
                },
            });
        });
    </script>
</body>

</html>
