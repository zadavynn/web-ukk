@extends('layouts.app-user')
@section('title', 'SMK Syafi\'i Akrom - Portal Informasi Kegiatan')

@section('content')

    <!-- HERO -->
    <div class="container mt-4 mb-5">
        <div class="text-center">
            <h2 class="fw-bold text-primary">Kegiatan Terbaru</h2>
            <p class="text-muted lead">Jelajahi program dan acara menarik yang diselenggarakan di sekolah kami.</p>
        </div>
    </div>

    <!-- ==================== KEGIATAN YANG AKAN DATANG ==================== -->
    <div class="container mb-5">
        <h3 class="fw-bold mb-3 text-primary">Kegiatan Yang Akan Datang</h3>
        <div class="row g-4">

            @for ($i = 1; $i <= 6; $i++)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="https://picsum.photos/600/300?random={{ $i }}" class="card-img-top"
                            alt="Kegiatan">
                        <div class="card-body">
                            <h5 class="card-title">Judul Kegiatan {{ $i }}</h5>
                            <p class="card-text small mb-1"><i class="bi bi-geo-alt text-primary"></i> Aula SMK Syafi'i
                                Akrom</p>
                            <p class="card-text small"><i class="bi bi-calendar text-primary"></i> 12 Desember 2025</p>
                            <a href="#" class="btn btn-primary w-100 mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>

    <!-- ==================== PANITIA (CAROUSEL) ==================== -->
    <div class="container mb-5">
        <h3 class="fw-bold mb-3 text-primary">Panitia</h3>

        <div id="panitiaCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @php $count = 0; @endphp
                @for ($slide = 1; $slide <= 3; $slide++)
                    <div class="carousel-item {{ $slide == 1 ? 'active' : '' }}">
                        <div class="row g-4">

                            @for ($card = 1; $card <= 3; $card++)
                                @php $count++; @endphp
                                <div class="col-md-4">
                                    <div class="card text-center shadow-sm h-100">
                                        <img src="https://picsum.photos/200?random={{ $count }}"
                                            class="rounded-circle mx-auto mt-3" width="120" height="120"
                                            alt="Panitia">
                                        <div class="card-body">
                                            <h5 class="card-title mb-1">Nama Panitia {{ $count }}</h5>
                                            <span class="badge bg-primary">Koordinator</span>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                        </div>
                    </div>
                @endfor

            </div>

            <!-- CONTROL -->
            <button class="carousel-control-prev" type="button" data-bs-target="#panitiaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#panitiaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>

    <!-- ==================== SPONSOR ==================== -->
    <div class="container mb-5">
        <h3 class="fw-bold mb-3 text-primary">Sponsor Kami</h3>
        <div class="row g-4">

            @for ($i = 1; $i <= 8; $i++)
                <div class="col-md-3 col-6">
                    <div class="card shadow-sm p-3 text-center h-100">
                        <img src="https://picsum.photos/250/150?random={{ $i }}" class="img-fluid"
                            alt="Sponsor">
                    </div>
                </div>
            @endfor

        </div>
    </div>

@endsection




<!-- CAROUSEL HEADER -->
{{-- <div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner rounded-3 shadow-lg">
            <div class="carousel-item active text-center bg-gradient bg-primary text-white py-5 position-relative overflow-hidden">
                <div class="bg-overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.3);"></div>
                <div class="position-relative z-index-1">
                    <i class="bi bi-calendar-event-fill fs-1 mb-3"></i>
                    <h2 class="fw-bold display-5">Bergabunglah dalam Acara Seru di SMK Syafi'i Akrom!</h2>
                    <p class="lead text-white-50">Tingkatkan pengalaman belajar Anda dengan berpartisipasi aktif dalam berbagai kegiatan menarik.</p>
                </div>
            </div>
            <div class="carousel-item text-center bg-gradient bg-success text-white py-5 position-relative overflow-hidden">
                <div class="bg-overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.3);"></div>
                <div class="position-relative z-index-1">
                    <i class="bi bi-check-circle-fill fs-1 mb-3"></i>
                    <h2 class="fw-bold display-5">Pantau Kehadiran dan Catatan Kegiatan dengan Mudah</h2>
                    <p class="lead text-white-50">Semua informasi penting sekolah tersedia dalam satu portal yang praktis dan terintegrasi.</p>
                </div>
            </div>
            <div class="carousel-item text-center bg-gradient bg-info text-white py-5 position-relative overflow-hidden">
                <div class="bg-overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.3);"></div>
                <div class="position-relative z-index-1">
                    <i class="bi bi-star-fill fs-1 mb-3"></i>
                    <h2 class="fw-bold display-5">Jadilah Bagian dari Komunitas Sekolah yang Dinamis</h2>
                    <p class="lead text-white-50">Temukan peluang baru dan bangun kenangan indah bersama teman-teman Anda.</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- SECTION KEGIATAN -->
    <section class="mb-5">
        <div class="text-center mb-4">
            <h2 class="h3 mb-2 text-primary fw-bold">Kegiatan Terbaru</h2>
            <p class="text-muted lead">Jelajahi program dan acara menarik yang diselenggarakan di sekolah kami untuk memperkaya pengalaman belajar Anda.</p>
        </div>

        <div class="row g-4">
            @forelse ($kegiatans as $kegiatan)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden hover-lift">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="bi bi-calendar-event fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold text-dark">{{ $kegiatan->nama }}</h6>
                                    <p class="text-muted small mb-0">{{ $kegiatan->lokasi }}</p>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar-check me-2"></i>
                                    <span>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</span>
                                </div>
                                <button class="btn btn-outline-primary btn-sm mt-3 w-100">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-calendar-x fs-1 text-muted mb-3"></i>
                    <h5 class="text-muted">Belum Ada Kegiatan Terjadwal</h5>
                    <p class="text-muted">Tetap pantau portal ini untuk update kegiatan menarik selanjutnya!</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- PANITIA & SPONSOR -->
    <div class="row g-4 mb-5">

        <!-- Panitia -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-people-fill fs-3 text-primary me-3"></i>
                        <h5 class="mb-0 fw-bold text-dark">Tim Panitia</h5>
                    </div>
                    <p class="text-muted small mb-4">Tim dedikasi yang bertanggung jawab atas kelancaran setiap kegiatan sekolah, siap membantu dan mengkoordinasi dengan sempurna.</p>

                    @if ($panitias->count() > 0)
                        <ul class="list-group list-group-flush border-0">
                            @foreach ($panitias as $p)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3 border-0">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="bi bi-person fs-5"></i>
                                        </div>
                                        <span class="fw-semibold">{{ $p->nama }}</span>
                                    </div>
                                    <span class="badge bg-primary-subtle text-primary">{{ $p->jabatan }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-people fs-1 text-muted mb-3"></i>
                            <p class="text-muted">Data panitia sedang diperbarui. Segera kembali!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sponsor -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-lg border-0 rounded-4">
                <div class="card-body p-4 text-center">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <i class="bi bi-building-fill fs-3 text-success me-3"></i>
                        <h5 class="mb-0 fw-bold text-dark">Sponsor Kami</h5>
                    </div>
                    <p class="text-muted small mb-4">Perusahaan dan organisasi visioner yang mendukung kegiatan sekolah kami, membantu menciptakan pengalaman belajar yang lebih baik.</p>

                    <div id="sponsorCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ($sponsors->chunk(3) as $chunkIndex => $chunk)
                                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                                        @foreach ($chunk as $s)
                                            <div class="text-center px-3 hover-scale">
                                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 60px; height: 60px;">
                                                    <i class="bi bi-building fs-3 text-muted"></i>
                                                </div>
                                                <div class="small fw-semibold text-dark">{{ $s->nama_sponsor }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="py-4">
                                    <i class="bi bi-building fs-1 text-muted mb-3"></i>
                                    <p class="text-muted">Sponsor sedang dalam proses. Terima kasih atas dukungan Anda!</p>
                                </div>
                            @endforelse
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#sponsorCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#sponsorCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}


{{-- <style>
.hover-lift:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}
.hover-scale:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}
.bg-overlay {
    background: linear-gradient(45deg, rgba(0,0,0,0.4), rgba(0,0,0,0.1));
}
.z-index-1 {
    z-index: 1;
}
</style> --}}
