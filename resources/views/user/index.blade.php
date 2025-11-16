@extends('layouts.app-user')
@section('title', 'SMK Syafi\'i Akrom - Portal Informasi Kegiatan')

@section('content')

    <!-- HERO -->
    <div class="bg-primary text-white py-5 mb-5 rounded shadow text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Portal Kegiatan</h1>
        <p class="lead">SMK Syafi'i Akrom - Inovasi untuk masa depan</p>

        <div class="row g-4 justify-content-center mt-4">
            <div class="col-auto text-center">
                <i class="bi bi-calendar-event fs-1"></i>
                <p class="mt-2 mb-0">Kegiatan Terjadwal</p>
            </div>
            <div class="col-auto text-center">
                <i class="bi bi-people fs-1"></i>
                <p class="mt-2 mb-0">Panitia Profesional</p>
            </div>
            <div class="col-auto text-center">
                <i class="bi bi-hand-thumbs-up fs-1"></i>
                <p class="mt-2 mb-0">Sponsor Terpercaya</p>
            </div>
        </div>
    </div>

    <!-- ALERT -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- KEGIATAN -->
    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="h4 text-primary">
                <i class="bi bi-calendar-event me-2"></i>Kegiatan Mendatang
            </h2>
            <p class="text-muted">Ikuti dan berpartisipasi dalam kegiatan sekolah</p>
        </div>

        @if ($kegiatans->count() > 0)
            <div class="row g-4">
                @foreach ($kegiatans as $kegiatan)
                    <div class="col-md-6 col-xl-4">
                        <div class="card h-100 shadow border-0">

                            <div class="card-body">
                                <h5 class="fw-bold">{{ $kegiatan->nama }}</h5>
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-geo-alt me-1"></i>{{ $kegiatan->lokasi }}
                                </small>

                                <p class="mb-2">
                                    <i class="bi bi-clock me-1"></i>
                                    <strong>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</strong>
                                </p>

                                @if ($kegiatan->status)
                                    <span class="badge bg-{{ $kegiatan->status == 'aktif' ? 'success' : 'warning' }}">
                                        {{ ucfirst($kegiatan->status) }}
                                    </span>
                                @endif

                                @if ($kegiatan->panitias)
                                    <div class="mt-3">
                                        <small class="text-muted">Panitia:</small>
                                        <div class="d-flex gap-1 flex-wrap">
                                            @foreach (array_slice($kegiatan->panitias, 0, 3) as $p)
                                                <span class="badge bg-light text-dark">{{ $p }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($kegiatan->sponsors)
                                    <div class="mt-3">
                                        <small class="text-muted">Sponsor:</small>
                                        <div class="d-flex gap-1 flex-wrap">
                                            @foreach (array_slice($kegiatan->sponsors, 0, 2) as $s)
                                                <span class="badge bg-success text-white">{{ $s }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-calendar-x fs-1 text-muted"></i>
                <p class="text-muted mt-3">Belum ada kegiatan</p>
            </div>
        @endif
    </section>

    <!-- PANITIA & SPONSOR -->
    <div class="row g-4 mb-5">

        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-people me-2"></i>Tim Panitia</h5>
                </div>
                <div class="card-body">
                    @if ($panitias->count() > 0)
                        @foreach ($panitias as $p)
                            <div class="p-3 bg-light rounded mb-3">
                                <h6 class="fw-bold mb-1">{{ $p->nama }}</h6>
                                <small class="text-muted d-block"><i class="bi bi-envelope me-1"></i>{{ $p->email }}</small>
                                <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $p->telepon }}</small>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted">Belum ada data panitia</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-hand-thumbs-up me-2"></i>Mitra Sponsor</h5>
                </div>
                <div class="card-body">
                    @if ($sponsors->count() > 0)
                        @foreach ($sponsors as $s)
                            <div class="p-3 bg-light rounded mb-3">
                                <h6 class="fw-bold text-success">{{ $s->nama_sponsor }}</h6>
                                <small class="text-muted"><i class="bi bi-envelope me-1"></i>{{ $s->kontak_sponsor }}</small>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted">Belum ada data sponsor</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

@endsection
