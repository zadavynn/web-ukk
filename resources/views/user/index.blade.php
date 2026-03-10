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
                    <img src="{{ asset('storage/img/background/kegiatan-user-1.jpeg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-2.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-3.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-4.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-5.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-6.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-7.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-8.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-9.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/img/background/kegiatan-user-10.jpg') }}" class="d-block w-100"
                        style="height:470px; object-fit:cover;">
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
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center text-center"
                        style="height:220px;">
                        <div>
                            <h2 class="fw-bold">Selamat Datang di Portal Kegiatan</h2>
                            <p class="lead">SMK Syafi'i Akrom - Pusat Informasi Resmi Kegiatan Sekolah</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="bg-warning text-dark d-flex align-items-center justify-content-center text-center"
                        style="height:220px;">
                        <div>
                            <h2 class="fw-bold">Kegiatan Seru Akan Datang!</h2>
                            <p class="lead">Jangan lewatkan event penting yang akan berlangsung</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="bg-success text-white d-flex align-items-center justify-content-center text-center"
                        style="height:220px;">
                        <div>
                            <h2 class="fw-bold">Dukung Kegiatan Sekolah!</h2>
                            <p class="lead">Panitia & Sponsor Berperan Besar dalam Kesuksesan Acara</p>
                        </div>
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
                <div class="col-md-3">
                    <div class="card shadow h-100 border-0 rounded-3">
                        <div class="card-body border-top border-4 border-primary rounded-2">
                            <h5 class="card-title fw-bold">{{ Str::title(strtolower($kegiatan->nama)) }}</h5>
                            <p class="card-text small mb-1">
                                <i class="bi bi-geo-alt text-danger"></i> {{ $kegiatan->lokasi }}
                            </p>
                            <p class="card-text small mb-1">
                                <i class="bi bi-calendar text-success"></i>
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container py-5">
        <div class="row g-5">
            <!-- PANITIA -->
            <div class="col-lg-6">
                <div class="mb-4">
                    <h3 class="fw-bold mb-2">Panitia</h3>
                    <p class="text-muted">Orang-orang hebat yang bekerja di balik layar kegiatan.</p>
                </div>
                <div class="accordion" id="panitiaAccordion">
                    @foreach ($panitias as $panitia)
                        <div
                            class="accordion-item border-0 shadow rounded-4 mb-3 overflow-hidden border-start border-4 border-info">
                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panitia{{ $loop->index }}">
                                    <div class="d-flex flex-column">
                                        <span>{{ Str::title(strtolower($panitia->nama)) }}</span>
                                        <small class="text-muted fw-normal">
                                            {{ \Illuminate\Support\Str::headline($panitia->jabatan) }}
                                        </small>
                                    </div>
                                </button>
                            </h2>
                            <div id="panitia{{ $loop->index }}" class="accordion-collapse collapse"
                                data-bs-parent="#panitiaAccordion">
                                <div class="accordion-body text-muted small">
                                    <i class="bi bi-quote me-2"></i>
                                    “{{ ucfirst(strtolower($panitia->quotes)) }}”
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- SPONSOR -->
            <div class="col-lg-6">
                <div class="mb-4">
                    <h3 class="fw-bold mb-2">Sponsor Kami</h3>
                    <p class="text-muted">Pihak yang mendukung terselenggaranya kegiatan ini.</p>
                </div>
                <div class="row g-3">
                    @foreach ($sponsors as $sponsor)
                        <div class="col-12">
                            <div class="card border-0 shadow rounded-4 h-100">
                                <div
                                    class="card-body d-flex align-items-center justify-content-between p-3 rounded-4 border-end border-4 border-success">
                                    <div>
                                        <h6 class="fw-semibold mb-0">
                                            {{ Str::title(strtolower($sponsor->nama_sponsor)) }}
                                        </h6>
                                    </div>
                                    <i class="bi bi-building text-muted fs-5"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
