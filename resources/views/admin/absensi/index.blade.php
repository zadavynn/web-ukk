@extends('layouts.app-admin')
@section('title', 'Absensi Siswa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Absensi Siswa</h1>
        <a href="{{ route('absensi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Absensi
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow-sm">
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
                            <td>{{ $absensi->kegiatan }}</td>
                            <td>
                                <span class="badge bg-primary">{{ $absensi->kelas }}</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $absensi->jumlah_hadir }} siswa</span>
                            </td>
                            <td>
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
@endsection
