@extends('layouts.app-admin')
@section('title', 'Dashboard Admin')
@section('content')
    <!-- Header Dashboard -->
    <div class="text-center mb-3 mt-3">
        <h1 class="fw-semibold text-capitalize">Selamat Datang Admin</h1>
        <p class="text-muted">Kelola kegiatan, panitia, peserta, sponsor, dan catatan dengan mudah.</p>
    </div>

    <!-- Statistik ringkas -->
    <div class="row g-3 mb-4">
        <!-- Total Kegiatan -->
        <div class="col-md">
            <a href="{{ route('kegiatan') }}"
                class="btn btn-outline-primary w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-calendar-event fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">5</h5>
                <p class="mb-0">Total Kegiatan</p>
            </a>
        </div>
        <!-- Total Panitia -->
        <div class="col-md">
            <a href="{{ route('panitia') }}"
                class="btn btn-outline-success w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-people fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">12</h5>
                <p class="mb-0">Total Panitia</p>
            </a>
        </div>
        <!-- Total Peserta -->
        <div class="col-md">
            <a href="{{ route('absensi') }}"
                class="btn btn-outline-warning w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-person-badge fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">54</h5>
                <p class="mb-0">Total Peserta</p>
            </a>
        </div>
        <!-- Total Sponsor -->
        <div class="col-md">
            <a href="{{ route('sponsor') }}"
                class="btn btn-outline-danger w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-cash-coin fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">5</h5>
                <p class="mb-0">Total Sponsor</p>
            </a>
        </div>
        <!-- Catatan -->
        <div class="col-md">
            <a href="{{ route('catatan') }}"
                class="btn btn-outline-info w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-journal-text fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">3</h5>
                <p class="mb-0">Catatan</p>
            </a>
        </div>
    </div>

    <!-- Daftar kegiatan terbaru -->
    <div class="card shadow-sm">
        <div class="card-header bg-light text-center">
            <h4 class="mb-0">Kegiatan Terbaru</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th class="col-3">KEGIATAN</th>
                            <th class="col-2">STATUS</th>
                            <th class="col-2">TANGGAL</th>
                            <th class="col-2">TEMPAT</th>
                            <th class="col-1">PANITIA</th>
                            <th class="col-1">PESERTA</th>
                            <th class="col-1">SPONSOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Seminar Motivasi</td>
                            <td><span class="badge bg-primary">Berlangsung</span></td>
                            <td>2025-06-25</td>
                            <td>Indor</td>
                            <td>15</td>
                            <td>15</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Bazar Sekolah</td>
                            <td><span class="badge bg-info">Akan datang</span></td>
                            <td>2025-07-10</td>
                            <td>Lapangan</td>
                            <td>5</td>
                            <td>10</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Donor Darah</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>2025-05-15</td>
                            <td>Aula</td>
                            <td>15</td>
                            <td>15</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('kegiatan') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
        </div>
    </div>
@endsection
