<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('datatables/css/datatables.css') }}" />
    <link rel="stylesheet" href="{{ asset('datatables/css/datatables.min.css') }}" />
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler me-2" type="button" title="Toggle sidebar" data-bs-toggle="offcanvas"
                data-bs-target="#sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand ps-2" href="{{ route('admin') }}">Admin Dashboard</a>
            <a class="btn btn-outline-danger" href="{{ route('logout') }}"><i
                    class="bi bi-box-arrow-right me-2"></i>Keluar</a>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebar" data-bs-backdrop="true"
        data-bs-scroll="false" style="width: 250px">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" title="Close" class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-dark">
                    <a href="{{ route('admin') }}" class="d-block text-white text-decoration-none p-2"><i
                            class="bi bi-house me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="{{ route('kegiatan') }}" class="d-block text-white text-decoration-none p-2"><i
                            class="bi bi-card-list me-2"></i>
                        Kegiatan
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="{{ route('panitia') }}" class="d-block text-white text-decoration-none p-2"><i
                            class="bi bi-person-badge me-2"></i>
                        Panitia
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="{{ route('absensi') }}" class="d-block text-white text-decoration-none p-2"><i
                            class="bi bi-person-lines-fill me-2"></i>
                        Absensi
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="{{ route('sponsor') }}" class="d-block text-white text-decoration-none p-2"><i
                            class="bi bi-cash me-2"></i>
                        Sponsor
                    </a>
                </li>
                <li class="list-group-item bg-dark">
                    <a href="{{ route('catatan') }}" class="d-block text-white text-decoration-none p-2"><i
                            class="bi bi-clipboard me-2"></i>
                        Catatan
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <main class="container mt-5 pt-4 flex-grow-1 mb-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white pb-1 pt-3 mt-auto">
        <div class="container text-center">
            <p>&copy; 2025 Admin SMK Syafi'i Akrom. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Tabel pertama
            $("#example").DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    zeroRecords: "Data tidak ditemukan 😅",
                    emptyTable: "Belum ada data yang tersedia",
                    paginate: {
                        first: "‹‹",
                        last: "››",
                        next: "›",
                        previous: "‹",
                    },
                },
            });

            // Tabel kedua
            $("#example2").DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    zeroRecords: "Data tidak ditemukan 😅",
                    emptyTable: "Belum ada data yang tersedia",
                    paginate: {
                        first: "‹‹",
                        last: "››",
                        next: "›",
                        previous: "‹",
                    },
                },
            });
        });
    </script>

</body>

</html>
