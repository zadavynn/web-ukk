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
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Panitia</th>
                        <th>Sponsor</th>
                        <th>Aksi</th>
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
                            <td>{{ implode(', ', $kegiatan->panitias) }}</td>
                            <td>{{ implode(', ', $kegiatan->sponsors) }}</td>
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

    @foreach ($kegiatans as $kegiatan)
        <div class="modal fade" id="detailModal{{ $kegiatan->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Kegiatan: {{ $kegiatan->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}</p>
                        <p><strong>Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                        <p><strong>Status:</strong> {{ $kegiatan->status == 'selesai' ? 'Selesai' : 'Belum Selesai' }}</p>
                        <p><strong>Panitia:</strong> {{ implode(', ', $kegiatan->panitias) }}</p>
                        <p><strong>Sponsor:</strong> {{ implode(', ', $kegiatan->sponsors) }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
