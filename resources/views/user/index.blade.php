@extends('layouts.app-user')
@section('title', 'SMK Syafi\'i Akrom - Portal Informasi Kegiatan')

@section('content')

    <!-- ========================= HERO ========================= -->
    <div class="container mt-4">

        <div id="heroCarousel" class="carousel slide mb-5 shadow rounded" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="bg-primary text-white text-center p-5">
                        <h2 class="fw-bold">Selamat Datang di Portal Kegiatan</h2>
                        <p class="lead">SMK Syafi'i Akrom - Pusat Informasi Resmi Kegiatan Sekolah</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="bg-warning text-dark text-center p-5">
                        <h2 class="fw-bold">Kegiatan Seru Akan Datang!</h2>
                        <p class="lead">Jangan lewatkan event penting yang akan berlangsung</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="bg-success text-white text-center p-5">
                        <h2 class="fw-bold">Dukung Kegiatan Sekolah!</h2>
                        <p class="lead">Panitia & Sponsor Berperan Besar dalam Kesuksesan Acara</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ===================== NOTIFIKASI / GIMIK ===================== -->
    <div class="container mb-4">
        <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-megaphone-fill me-2"></i>
            <strong>Info Terbaru:</strong> Beberapa kegiatan baru saja ditambahkan! Yuk cek jadwalnya!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>


    <!-- ====================== KEGIATAN YANG AKAN DATANG ====================== -->
    <div class="container mb-5">

        <h3 class="fw-bold text-center text-primary mb-1">Kegiatan Yang Akan Datang</h3>
        <p class="text-center text-muted mb-4">Temukan berbagai acara seru yang akan berlangsung dalam waktu dekat.</p>

        <div class="row g-4">

            <!-- Card Kegiatan -->
            <div class="col-md-4">
                <div class="card shadow h-100 border-0">
                    <div class="card-header bg-info text-white text-center fw-bold">
                        Kegiatan Menarik
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Judul Kegiatan</h5>
                        <p class="card-text small mb-1">
                            <i class="bi bi-geo-alt text-danger"></i> Aula SMK Syafi'i Akrom
                        </p>
                        <p class="card-text small mb-3">
                            <i class="bi bi-calendar text-success"></i> 12 Desember 2025
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card Kegiatan 2 -->
            <div class="col-md-4">
                <div class="card shadow h-100 border-0">
                    <div class="card-header bg-info text-white text-center fw-bold">
                        Event Besar
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Workshop Teknologi</h5>
                        <p class="card-text small">
                            <i class="bi bi-geo-alt text-danger"></i> Lab Komputer 1
                        </p>
                        <p class="card-text small">
                            <i class="bi bi-calendar text-success"></i> 20 Desember 2025
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card Kegiatan 3 -->
            <div class="col-md-4">
                <div class="card shadow h-100 border-0">
                    <div class="card-header bg-info text-white text-center fw-bold">
                        Seminar Edukatif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Seminar Karir</h5>
                        <p class="card-text small">
                            <i class="bi bi-geo-alt text-danger"></i> Ruang Multimedia
                        </p>
                        <p class="card-text small">
                            <i class="bi bi-calendar text-success"></i> 15 Januari 2026
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- =========================== PANITIA & SPONSOR =========================== -->
    <div class="container mb-5">
        <div class="row g-4">

            <!-- Panitia -->
            <div class="col-md-6">
                <h3 class="fw-bold text-primary">Panitia</h3>
                <p class="text-muted">Orang-orang hebat yang bekerja di balik layar.</p>

                <div class="accordion" id="panitiaAccordion">

                    <!-- Panitia 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading1">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#p1" aria-expanded="false" aria-controls="p1">
                                Nama Panitia 1 - Jabatan 1
                            </button>
                        </h2>
                        <div id="p1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                            data-bs-parent="#panitiaAccordion">
                            <div class="accordion-body">
                                <p class="mb-1"><strong>Quotes:</strong> “Tetap semangat dalam berproses!”</p>
                                <small>Kelas: XI RPL 1</small>
                            </div>
                        </div>
                    </div>

                    <!-- Panitia 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading2">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#p2" aria-expanded="false" aria-controls="p2">
                                Nama Panitia 2 - Jabatan 2
                            </button>
                        </h2>
                        <div id="p2" class="accordion-collapse collapse" aria-labelledby="heading2"
                            data-bs-parent="#panitiaAccordion">
                            <div class="accordion-body">
                                <p class="mb-1"><strong>Quotes:</strong> “Kerja keras tidak akan mengkhianati hasil.”</p>
                                <small>Kelas: XI TKJ 1</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Sponsor -->
            <div class="col-md-6">
                <h3 class="fw-bold text-primary">Sponsor Kami</h3>
                <p class="text-muted">Mereka yang mendukung kegiatan sekolah.</p>

                <ul class="list-group shadow mb-2">
                    <li class="list-group-item">
                        <h5 class="fw-bold mb-1">Nama Sponsor</h5>
                        <small class="text-muted">Bergabung sejak 2024</small>
                        <p class="mt-2 mb-1">“Semoga kegiatan sekolah semakin maju!”</p>
                    </li>
                </ul>
                <ul class="list-group shadow mb-2">
                    <li class="list-group-item">
                        <h5 class="fw-bold mb-1">Nama Sponsor</h5>
                        <small class="text-muted">Bergabung sejak 2024</small>
                        <p class="mt-2 mb-1">“Semoga kegiatan sekolah semakin maju!”</p>
                    </li>
                </ul>
            </div>

        </div>
    </div>

@endsection
