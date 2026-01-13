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
                            <td>{{ $catatan->kegiatan }}</td>
                            <td>{{ Str::limit($catatan->catatan, 50) }}</td>
                            <td>
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
@endsection
