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
            <table id="example" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Kegiatan</th>
                        <th>Panitia</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $absensi)
                        <tr>
                            <td>{{ $absensi->kegiatan_nama }}</td>
                            <td>{{ $absensi->panitia_nama }}</td>
                            <td>{{ $absensi->status == 'hadir' ? 'Hadir' : 'Tidak Hadir' }}</td>
                            <td>{{ $absensi->keterangan }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $absensi->id }}" aria-label="Detail"><i
                                        class="bi bi-eye"></i></button>
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-sm btn-warning"
                                    aria-label="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus absensi ini?')"
                                        aria-label="Hapus"><i class="bi bi-trash"></i></button>
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
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Kegiatan:</strong> {{ $absensi->kegiatan_nama }}</p>
                        <p><strong>Panitia:</strong> {{ $absensi->panitia_nama }}</p>
                        <p><strong>Status:</strong> {{ $absensi->status == 'hadir' ? 'Hadir' : 'Tidak Hadir' }}</p>
                        <p><strong>Keterangan:</strong> {{ $absensi->keterangan }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
