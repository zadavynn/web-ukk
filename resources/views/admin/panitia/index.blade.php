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
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($panitias as $panitia)
                        <tr>
                            <td>{{ $panitia->nama }} @if ($panitia->jabatan == 'ketua')
                                    <span class="badge bg-primary">Ketua</span>
                                @elseif($panitia->jabatan == 'wakil_ketua')
                                    <span class="badge bg-secondary">Wakil Ketua</span>
                                @elseif($panitia->jabatan == 'bendahara')
                                    <span class="badge bg-success">Bendahara</span>
                                @elseif($panitia->jabatan == 'sekretaris')
                                    <span class="badge bg-info">Sekretaris</span>
                                @else
                                    <span class="badge bg-light text-dark">Anggota</span>
                                @endif
                            </td>
                            <td>{{ ucfirst(str_replace('_', ' ', $panitia->jabatan)) }}</td>
                            <td>{{ $panitia->email }}</td>
                            <td>{{ $panitia->telepon }}</td>
                            <td>{{ implode(', ', $panitia->kegiatans) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $panitia->id }}" aria-label="Detail"><i
                                        class="bi bi-eye"></i></button>
                                <a href="{{ route('panitia.edit', $panitia->id) }}" class="btn btn-sm btn-warning"
                                    aria-label="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('panitia.destroy', $panitia->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus panitia ini?')"
                                        aria-label="Hapus"><i class="bi bi-trash"></i></button>
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
                        <p><strong>Jabatan:</strong> {{ ucfirst(str_replace('_', ' ', $panitia->jabatan)) }}</p>
                        <p><strong>Kegiatan:</strong> {{ implode(', ', $panitia->kegiatans) }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
