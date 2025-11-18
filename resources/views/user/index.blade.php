@extends('layouts.app-user')
@section('title', 'SMK Syafi\'i Akrom - Portal Informasi Kegiatan')

@section('content')

    <!-- CAROUSEL HEADER -->
    <div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner rounded-3 shadow-sm">
            <div class="carousel-item active text-center bg-secondary-subtle py-5">
                <h2 class="fw-bold">Menampilkan Informasi Kegiatan Sekolah</h2>
                <p class="text-muted">Eksplor berbagai kegiatan, panitia, sponsor, dan absensi siswa.</p>
            </div>
            <div class="carousel-item text-center bg-secondary-subtle py-5">
                <h2 class="fw-bold">Ikuti Berbagai Acara Seru di Sekolah</h2>
                <p class="text-muted">Tingkatkan pengalaman belajar dengan berpartisipasi aktif.</p>
            </div>
            <div class="carousel-item text-center bg-secondary-subtle py-5">
                <h2 class="fw-bold">Pantau Kehadiran dan Catatan Kegiatan</h2>
                <p class="text-muted">Semua informasi sekolah dalam satu tempat.</p>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
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
                    <li><i class="bi bi-exclamation-circle me-1"></i>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- SECTION KEGIATAN -->
    <section class="mb-5">
        <div class="text-center mb-3">
            <h2 class="h4 mb-1">Kegiatan</h2>
            <p class="text-muted small">Program dan acara terbaru di sekolah</p>
        </div>

        <div class="row g-3">
            @forelse ($kegiatans as $kegiatan)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex gap-3 align-items-start">
                            <i class="bi bi-calendar-event fs-3 text-primary"></i>
                            <div>
                                <h6 class="mb-1">{{ $kegiatan->nama }}</h6>
                                <p class="text-muted small mb-2">{{ $kegiatan->lokasi }}</p>
                                <div class="small text-muted">
                                    <i class="bi bi-calendar-check me-1"></i>
                                    {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="bi bi-calendar-x fs-1 text-muted"></i>
                    <p class="text-muted mt-3">Belum ada kegiatan</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- PANITIA & SPONSOR -->
    <div class="row g-3 mb-5">

        <!-- Panitia -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-2">Panitia</h5>
                    <p class="text-muted small mb-3">Panitia bertanggung jawab atas kegiatan sekolah.</p>

                    @if ($panitias->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($panitias as $p)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $p->nama }}
                                    <span class="badge bg-secondary">{{ $p->email }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted">Belum ada data panitia</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sponsor -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="mb-2">Sponsor</h5>
                    <p class="text-muted small mb-3">Perusahaan dan organisasi yang mendukung kegiatan sekolah.</p>

                    <div id="sponsorCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @forelse ($sponsors->chunk(3) as $chunkIndex => $chunk)
                                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                                        @foreach ($chunk as $s)
                                            <div class="text-center px-3">
                                                <i class="bi bi-building fs-2 text-muted"></i>
                                                <div class="small mt-2">{{ $s->nama_sponsor }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="text-muted">Belum ada sponsor</div>
                            @endforelse

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#sponsorCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#sponsorCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
