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
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Panitia</th>
                        <th>Sponsor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatans as $kegiatan)
                        <tr>
                            <td>{{ $kegiatan->nama }}</td>
                            <td>{{ $kegiatan->tanggal->format('d/m/Y') }}</td>
                            <td>
                                @if ($kegiatan->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-warning">Belum Selesai</span>
                                @endif
                            </td>
                            <td>{{ $kegiatan->panitias->pluck('nama')->join(', ') }}</td>
                            <td>{{ $kegiatan->sponsors->pluck('nama')->join(', ') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $kegiatan->id }}">Detail</button>
                                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                @if ($kegiatan->status == 'belum_selesai')
                                    <form action="{{ route('kegiatan.finish', $kegiatan->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success"
                                            onclick="return confirm('Apakah Anda yakin ingin menyelesaikan kegiatan ini?')">Selesai</button>
                                    </form>
                                @endif
                                <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($kegiatans as $kegiatan)
        <div class="modal fade" id="detailModal{{ $kegiatan->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Kegiatan: {{ $kegiatan->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Deskripsi:</strong> {{ $kegiatan->deskripsi }}</p>
                        <p><strong>Tanggal:</strong> {{ $kegiatan->tanggal->format('d/m/Y') }}</p>
                        <p><strong>Status:</strong> {{ $kegiatan->status == 'selesai' ? 'Selesai' : 'Belum Selesai' }}</p>
                        <p><strong>Panitia:</strong> {{ $kegiatan->panitias->pluck('nama')->join(', ') }}</p>
                        <p><strong>Sponsor:</strong> {{ $kegiatan->sponsors->pluck('nama')->join(', ') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
