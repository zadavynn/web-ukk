@extends('layouts.app-admin')
@section('title', 'Panitia')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Panitia</h1>
        <a href="{{ route('panitia.create') }}" class="btn btn-primary">Tambah Panitia</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($panitias as $panitia)
                        <tr>
                            <td>{{ $panitia->nama }}</td>
                            <td>{{ $panitia->email }}</td>
                            <td>{{ $panitia->telepon }}</td>
                            <td>{{ $panitia->kegiatans->pluck('nama')->join(', ') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $panitia->id }}">Detail</button>
                                <a href="{{ route('panitia.edit', $panitia->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('panitia.destroy', $panitia->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus panitia ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($panitias as $panitia)
        <div class="modal fade" id="detailModal{{ $panitia->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Panitia: {{ $panitia->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nama:</strong> {{ $panitia->nama }}</p>
                        <p><strong>Email:</strong> {{ $panitia->email }}</p>
                        <p><strong>Telepon:</strong> {{ $panitia->telepon }}</p>
                        <p><strong>Kegiatan:</strong> {{ $panitia->kegiatans->pluck('nama')->join(', ') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
