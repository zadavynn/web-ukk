@extends('layouts.app-admin')
@section('title', 'Catatan')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Catatan</h1>
        <a href="{{ route('catatan.create') }}" class="btn btn-primary">Tambah Catatan</a>
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
                        <th>Evaluasi</th>
                        <th>Perbaikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catatans as $catatan)
                        <tr>
                            <td>{{ $catatan->kegiatan->nama }}</td>
                            <td>{{ Str::limit($catatan->evaluasi, 50) }}</td>
                            <td>{{ Str::limit($catatan->perbaikan, 50) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $catatan->id }}">Detail</button>
                                <a href="{{ route('catatan.edit', $catatan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('catatan.destroy', $catatan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($catatans as $catatan)
        <div class="modal fade" id="detailModal{{ $catatan->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Catatan: {{ $catatan->kegiatan->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Kegiatan:</strong> {{ $catatan->kegiatan->nama }}</p>
                        <p><strong>Evaluasi:</strong> {{ $catatan->evaluasi }}</p>
                        <p><strong>Perbaikan:</strong> {{ $catatan->perbaikan }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
