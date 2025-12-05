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
                        <th class="col-1">Panitia</th>
                        <th class="col-1">Sponsor</th>
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
                            <td>{{ count($kegiatan->panitias) }}</td>
                            <td>{{ count($kegiatan->sponsors) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $kegiatan->id }}" aria-label="Detail"><i
                                        class="bi bi-eye"></i></button>
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
        <div class="modal fade" id="detailModal{{ $kegiatan->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-sm">
                    <!-- HEADER -->
                    <div class="modal-header bg-light">
                        <h5 class="modal-title fw-bold">
                            <i class="bi bi-info-circle me-2"></i>
                            Detail Kegiatan: {{ $kegiatan->nama }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- BODY -->
                    <div class="modal-body">
                        <div class="list-group">
                            <div class="list-group-item d-flex justify-content-between">
                                <span><i class="bi bi-flag me-2"></i><strong>Status</strong></span>
                                <span
                                    class="badge {{ $kegiatan->status == 'selesai' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $kegiatan->status == 'selesai' ? 'Selesai' : 'Belum Selesai' }}
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span><i class="bi bi-calendar3 me-2"></i><strong>Tanggal</strong></span>
                                <span>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <span><i class="bi bi-geo-alt me-2"></i><strong>Lokasi</strong></span>
                                <span>{{ $kegiatan->lokasi }}</span>
                            </div>
                            <div class="list-group-item">
                                <strong><i class="bi bi-people me-2"></i>Panitia</strong>
                                <div class="mt-1">{{ implode(', ', $kegiatan->panitias) }}</div>
                            </div>
                            <div class="list-group-item">
                                <strong><i class="bi bi-building me-2"></i>Sponsor</strong>
                                <div class="mt-1">{{ implode(', ', $kegiatan->sponsors) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
