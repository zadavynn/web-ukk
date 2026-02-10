@extends('layouts.app-admin')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="text-center mb-3 mt-3">
        <h1 class="fw-semibold text-capitalize">Selamat Datang Admin</h1>
        <p class="text-muted">Kelola kegiatan, panitia, absensi, sponsor, dan catatan dengan mudah.</p>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-md">
            <a href="{{ route('kegiatan.index') }}"
                class="btn btn-outline-primary w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-calendar-event fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">{{ $totalKegiatan }}</h5>
                <p class="mb-0">Total Kegiatan</p>
            </a>
        </div>
        <div class="col-md">
            <a href="{{ route('panitia.index') }}"
                class="btn btn-outline-success w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-people fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">{{ $totalPanitia }}</h5>
                <p class="mb-0">Total Panitia</p>
            </a>
        </div>
        <div class="col-md">
            <a href="{{ route('absensi.index') }}"
                class="btn btn-outline-warning w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-person-badge fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">{{ $totalPeserta }}</h5>
                <p class="mb-0">Total Absensi</p>
            </a>
        </div>
        <div class="col-md">
            <a href="{{ route('sponsor.index') }}"
                class="btn btn-outline-danger w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-cash-coin fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">{{ $totalSponsor }}</h5>
                <p class="mb-0">Total Sponsor</p>
            </a>
        </div>
        <div class="col-md">
            <a href="{{ route('catatan.index') }}"
                class="btn btn-outline-info w-100 text-center text-decoration-none py-3 shadow-sm">
                <i class="bi bi-journal-text fs-2 mb-2 d-block"></i>
                <h5 class="card-title mb-1">{{ $totalCatatan }}</h5>
                <p class="mb-0">Catatan</p>
            </a>
        </div>
    </div>
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
                            <th class="col-2">LOKASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestKegiatans as $kegiatan)
                            <tr>
                                <td>{{ $kegiatan->nama }}</td>
                                <td>
                                    @if ($kegiatan->status == 'selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-primary">Belum Selesai</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}</td>
                                <td>{{ $kegiatan->lokasi ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted">Belum ada kegiatan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
        </div>
    </div>
@endsection
