@extends('layouts.app-admin')
@section('title', 'Kegiatan Admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="ms-3">Kegiatan</h1>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="col-2">Nama</th>
                        <th class="col-2">Status</th>
                        <th class="col-2">Tanggal</th>
                        <th class="col-2">Lokasi</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatans as $kegiatan)
                        <tr>
                            <td>{{ Str::title(strtolower($kegiatan->nama)) }}</td>
                            <td>
                                @if ($kegiatan->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-primary">Belum Selesai</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}</td>
                            <td>{{ Str::title(strtolower($kegiatan->lokasi)) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modalKegiatan{{ $kegiatan->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-sm btn-warning"
                                    aria-label="Edit"><i class="bi bi-pencil"></i></a>
                                @if ($kegiatan->status == 'belum_selesai')
                                    <form action="{{ route('kegiatan.finish', $kegiatan->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success"
                                            onclick="return confirm('Apakah Anda yakin ingin menyelesaikan kegiatan ini?')"><i
                                                class="bi bi-check-circle"></i></button>
                                    </form>
                                @endif
                                <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')"
                                        aria-label="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Detail Kegiatan -->
    @foreach ($kegiatans as $kegiatan)
        <div class="modal fade" id="modalKegiatan{{ $kegiatan->id }}" tabindex="-1"
            aria-labelledby="modalKegiatanLabel{{ $kegiatan->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="modalKegiatanLabel{{ $kegiatan->id }}">Detail Kegiatan</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td>{{ Str::title(strtolower($kegiatan->nama)) }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($kegiatan->status == 'selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-primary">Belum Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ Str::title(strtolower($kegiatan->lokasi)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
