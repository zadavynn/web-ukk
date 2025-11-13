@extends('layouts.app-user')
@section('title', 'User')
@section('content')
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
        <button class="carousel-control-prev" title="back" type="button" data-bs-target="#heroCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" title="next" type="button" data-bs-target="#heroCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <section id="activities" class="mb-5">
        <div class="text-center mb-3">
            <h2 class="h4 mb-1">Kegiatan</h2>
            <p class="text-muted small">Program dan acara untuk memperkaya kehidupan siswa</p>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-balloon fs-3 text-primary"></i>
                        <div>
                            <h6 class="mb-1">Turnamen Basket</h6>
                            <p class="text-muted small mb-2">Kompetisi basket antar kelas tahunan</p>
                            <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i> 20 Mar 2025 • <i
                                    class="bi bi-geo-alt ms-2 me-1"></i>Gedung Olahraga</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-easel fs-3 text-primary"></i>
                        <div>
                            <h6 class="mb-1">Pertunjukan Drama</h6>
                            <p class="text-muted small mb-2">Produksi teater kreatif oleh siswa</p>
                            <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i> 05 Apr 2025 • <i
                                    class="bi bi-geo-alt ms-2 me-1"></i>Aula</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-flask-florence fs-3 text-primary"></i>
                        <div>
                            <h6 class="mb-1">Pameran Sains</h6>
                            <p class="text-muted small mb-2">Pameran proyek inovatif dari para siswa</p>
                            <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i> 12 Mei 2025 • <i
                                    class="bi bi-geo-alt ms-2 me-1"></i>Hall</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row g-3 mb-5">
        <!-- Kolom Panitia -->
        <div id="committees" class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="mb-2">Panitia</h5>
                    <p class="text-muted small mb-3">
                        Panitia yang bertanggung jawab pada kegiatan dan pengembangan sekolah.
                    </p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Penanggung <span class="badge bg-secondary">Pak Sugeng</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ketua <span class="badge bg-secondary">Ahmad Fauzi</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Wakil Ketua <span class="badge bg-secondary">Lita Aulia</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kolom Sponsor -->
        <div id="sponsors" class="col-lg-6">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="mb-2">Sponsor</h5>
                    <p class="text-muted small mb-3">Organisasi yang mendukung kegiatan sekolah</p>

                    <div id="sponsorCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <div class="d-flex justify-content-center gap-3 flex-wrap">
                                    <div class="text-center px-3">
                                        <i class="bi bi-building fs-2 text-muted"></i>
                                        <div class="small mt-2">Perusahaan Lokal</div>
                                    </div>
                                    <div class="text-center px-3">
                                        <i class="bi bi-bank fs-2 text-muted"></i>
                                        <div class="small mt-2">Yayasan Pendidikan</div>
                                    </div>
                                    <div class="text-center px-3">
                                        <i class="bi bi-people fs-2 text-muted"></i>
                                        <div class="small mt-2">Mitra Komunitas</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <div class="d-flex justify-content-center gap-3 flex-wrap">
                                    <div class="text-center px-3">
                                        <i class="bi bi-shop fs-2 text-muted"></i>
                                        <div class="small mt-2">Toko Buku Nusantara</div>
                                    </div>
                                    <div class="text-center px-3">
                                        <i class="bi bi-lightning-charge fs-2 text-muted"></i>
                                        <div class="small mt-2">Energi Hijau</div>
                                    </div>
                                    <div class="text-center px-3">
                                        <i class="bi bi-heart fs-2 text-muted"></i>
                                        <div class="small mt-2">Komunitas Peduli Anak</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <div class="d-flex justify-content-center gap-3 flex-wrap">
                                    <div class="text-center px-3">
                                        <i class="bi bi-mortarboard fs-2 text-muted"></i>
                                        <div class="small mt-2">Beasiswa Cerah</div>
                                    </div>
                                    <div class="text-center px-3">
                                        <i class="bi bi-tree fs-2 text-muted"></i>
                                        <div class="small mt-2">Hijaukan Bumi</div>
                                    </div>
                                    <div class="text-center px-3">
                                        <i class="bi bi-hospital fs-2 text-muted"></i>
                                        <div class="small mt-2">Klinik Sehat</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kontrol Carousel -->
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
