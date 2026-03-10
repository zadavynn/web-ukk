@extends('layouts.app-admin')
@section('title', 'Panitia')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="ms-3">Panitia</h1>
        <a href="{{ route('panitia.create') }}" class="btn btn-primary">Tambah Panitia</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Kelas</th>
                        <th>Telepon</th>
                        <th>Quotes</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($panitias as $panitia)
                        <tr>
                            <td>{{ Str::title(strtolower($panitia->nama)) }}</td>
                            <td>
                                @if ($panitia->jabatan == 'ketua')
                                    <span class="badge bg-primary">Ketua</span>
                                @elseif($panitia->jabatan == 'wakil_ketua')
                                    <span class="badge bg-info">Wakil Ketua</span>
                                @elseif($panitia->jabatan == 'sekretaris')
                                    <span class="badge bg-success">Sekretaris</span>
                                @elseif($panitia->jabatan == 'bendahara')
                                    <span class="badge bg-secondary">Bendahara</span>
                                @else
                                    <span class="badge bg-light text-dark">Anggota</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-warning">{{ $panitia->kelas }}</span>
                            </td>
                            <td>{{ $panitia->telepon }}</td>
                            <td>{{ Str::limit(ucfirst(strtolower($panitia->quotes)), 20) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modalPanitia{{ $panitia->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
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
    <!-- Modal Detail Panitia -->
    @foreach ($panitias as $panitia)
        <div class="modal fade" id="modalPanitia{{ $panitia->id }}" tabindex="-1"
            aria-labelledby="modalPanitiaLabel{{ $panitia->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="modalPanitiaLabel{{ $panitia->id }}">Detail Panitia</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td>{{ Str::title(strtolower($panitia->nama)) }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>
                                    @if ($panitia->jabatan == 'ketua')
                                        <span class="badge bg-primary">Ketua</span>
                                    @elseif($panitia->jabatan == 'wakil_ketua')
                                        <span class="badge bg-info">Wakil Ketua</span>
                                    @elseif($panitia->jabatan == 'sekretaris')
                                        <span class="badge bg-success">Sekretaris</span>
                                    @elseif($panitia->jabatan == 'bendahara')
                                        <span class="badge bg-secondary">Bendahara</span>
                                    @else
                                        <span class="badge bg-light text-dark">Anggota</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td><span class="badge bg-warning">{{ $panitia->kelas }}</span></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $panitia->telepon }}</td>
                            </tr>
                            <tr>
                                <th>Quotes</th>
                                <td>{{ ucfirst(strtolower($panitia->quotes)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
