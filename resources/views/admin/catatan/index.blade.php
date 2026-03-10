@extends('layouts.app-admin')
@section('title', 'Catatan')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="ms-3">Catatan</h1>
        <a href="{{ route('catatan.create') }}" class="btn btn-primary">Tambah Catatan</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Kegiatan</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catatans as $catatan)
                        <tr>
                            <td>{{ Str::title(strtolower($catatan->kegiatan)) }}</td>
                            <td>{{ Str::limit($catatan->catatan, 30) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modalCatatan{{ $catatan->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="{{ route('catatan.edit', $catatan->id) }}" class="btn btn-sm btn-warning"
                                    aria-label="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('catatan.destroy', $catatan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')"
                                        aria-label="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Detail Catatan -->
    @foreach ($catatans as $catatan)
        <div class="modal fade" id="modalCatatan{{ $catatan->id }}" tabindex="-1"
            aria-labelledby="modalCatatanLabel{{ $catatan->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="modalCatatanLabel{{ $catatan->id }}">Detail Catatan</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Kegiatan</th>
                                <td>{{ Str::title(strtolower($catatan->kegiatan)) }}</td>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <td>{{ $catatan->catatan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
