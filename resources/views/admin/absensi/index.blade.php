@extends('layouts.app-admin')
@section('title', 'Absensi')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Absensi</h1>
        <a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kegiatan</th>
                        <th>Kelas</th>
                        <th>Jumlah Hadir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $absensi)
                        <tr>
                            <td>{{ $absensi->kegiatan->nama }}</td>
                            <td>{{ $absensi->kelas }}</td>
                            <td>{{ $absensi->jumlah_hadir }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $absensi->id }}">Detail</button>
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus absensi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($absensis as $absensi)
        <div class="modal fade" id="detailModal{{ $absensi->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Kegiatan:</strong> {{ $absensi->kegiatan->nama }}</p>
                        <p><strong>Kelas:</strong> {{ $absensi->kelas }}</p>
                        <p><strong>Jumlah Hadir:</strong> {{ $absensi->jumlah_hadir }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
