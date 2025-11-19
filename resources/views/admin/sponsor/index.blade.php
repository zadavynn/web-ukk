@extends('layouts.app-admin')
@section('title', 'Sponsor')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Sponsor</h1>
        <a href="{{ route('sponsor.create') }}" class="btn btn-primary">Tambah Sponsor</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $sponsor)
                        <tr>
                            <td>{{ $sponsor->nama_sponsor }}</td>
                            <td>{{ $sponsor->kontak_sponsor }}</td>
                            <td>{{ implode(', ', $sponsor->kegiatans) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $sponsor->id }}" aria-label="Detail"><i
                                        class="bi bi-eye"></i></button>
                                <a href="{{ route('sponsor.edit', $sponsor->id) }}" class="btn btn-sm btn-warning"
                                    aria-label="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('sponsor.destroy', $sponsor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus sponsor ini?')"
                                        aria-label="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($sponsors as $sponsor)
        <div class="modal fade" id="detailModal{{ $sponsor->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Sponsor: {{ $sponsor->nama_sponsor }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nama:</strong> {{ $sponsor->nama_sponsor }}</p>
                        <p><strong>Kontak:</strong> {{ $sponsor->kontak_sponsor }}</p>
                        <p><strong>Kegiatan:</strong> {{ implode(', ', $sponsor->kegiatans) }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
