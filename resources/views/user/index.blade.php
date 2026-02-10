@extends('layouts.app-user')
@section('title', 'SMK Syafi\'i Akrom - Informasi Kegiatan')
@section('content')
    <div class="container my-4">
        <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-megaphone-fill me-2"></i>
            <strong>Info Terbaru:</strong> Beberapa kegiatan baru saja ditambahkan! Yuk cek jadwalnya!
        </div>
    </div>
    <div class="container mt-4">
        <div id="carousel10" class="carousel slide shadow rounded-4 overflow-hidden" data-bs-ride="carousel"
            data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-1.jpeg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-2.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-3.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-4.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-5.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-6.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-7.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-8.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-9.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-center text-center text-white p-5 bg-dark bg-opacity-50"
                        style="background-image: url('{{ asset('storage/img/background/kegiatan-user-10.jpg') }}'); background-size: cover; background-position: center; height: 590px;">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel10" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel10" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
    <div class="container mt-5">
        <div id="heroCarousel" class="carousel slide mb-5 shadow rounded-3 overflow-hidden" data-bs-ride="carousel">
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
    <div class="container mb-5">
        <h3 class="fw-bold text-center text-primary mb-1">Kegiatan Yang Akan Datang</h3>
        <p class="text-center text-muted mb-4">Temukan berbagai acara seru yang akan berlangsung dalam waktu dekat.</p>
        <div class="row g-4">
            @foreach ($kegiatans as $kegiatan)
            <div class="col-md-4">
                <div class="card shadow h-100 border-0">
                    <div class="card-header bg-info text-white text-center fw-bold">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $kegiatan->nama }}</h5>
                        <p class="card-text small mb-1">
                            <i class="bi bi-geo-alt text-danger"></i> {{ $kegiatan->lokasi }}
                        </p>
                        <p class="card-text small mb-1">
                            <i class="bi bi-calendar text-success"></i> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container mb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <h3 class="fw-bold text-primary">Panitia</h3>
                <p class="text-muted">Orang-orang hebat yang bekerja di balik layar.</p>
                <div class="accordion" id="panitiaAccordion">
                    @foreach ($panitias as $panitia)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading1">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#p1" aria-expanded="false" aria-controls="p1">
                                {{ $panitia->nama }} - {{ \Illuminate\Support\Str::headline($panitia->jabatan) }}
                            </button>
                        </h2>
                        <div id="p1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                            data-bs-parent="#panitiaAccordion">
                            <div class="accordion-body">
                                <p class="mb-1"><strong>Quotes:</strong> “{{ $panitia->quotes }}”</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold text-primary">Sponsor Kami</h3>
                <p class="text-muted">Mereka yang mendukung kegiatan sekolah.</p>
                @foreach ($sponsors as $sponsor)
                <ul class="list-group shadow mb-2">
                    <li class="list-group-item">
                        <h5 class="fw-bold mb-1">{{ $sponsor->nama_sponsor }}</h5>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection
