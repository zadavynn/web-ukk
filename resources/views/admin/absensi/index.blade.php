@extends('layouts.app-admin')
@section('title', 'Absensi Siswa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="ms-3">Absensi Siswa</h1>
        <a href="{{ route('absensi.create') }}" class="btn btn-primary">
            Tambah Absensi
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Kegiatan</th>
                        <th>Kelas</th>
                        <th>Jumlah Hadir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensis as $key => $absensi)
                        <tr>
                            <td>{{ Str::title(strtolower($absensi->kegiatan)) }}</td>
                            <td>
                                <span class="badge bg-primary">{{ $absensi->kelas }}</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $absensi->jumlah_hadir }} siswa</span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modalAbsensi{{ $absensi->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-sm btn-warning"
                                    aria-label="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')" aria-label="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data absensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Detail Absensi -->
    @foreach ($absensis as $absensi)
        <div class="modal fade" id="modalAbsensi{{ $absensi->id }}" tabindex="-1"
            aria-labelledby="modalAbsensiLabel{{ $absensi->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="modalAbsensiLabel{{ $absensi->id }}">Detail Absensi</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Kegiatan</th>
                                <td>{{ Str::title(strtolower($absensi->kegiatan)) }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td><span class="badge bg-primary">{{ $absensi->kelas }}</span></td>
                            </tr>
                            <tr>
                                <th>Jumlah Hadir</th>
                                <td><span class="badge bg-secondary">{{ $absensi->jumlah_hadir }} siswa</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
