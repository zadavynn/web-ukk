@extends('layouts.app-admin')
@section('title', 'Kegiatan Admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kegiatan</h1>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
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
                            <td>{{ $kegiatan->nama }}</td>
                            <td>
                                @if ($kegiatan->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-primary">Belum Selesai</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}</td>
                            <td>{{ $kegiatan->lokasi }}</td>
                            <td>
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
@endsection
