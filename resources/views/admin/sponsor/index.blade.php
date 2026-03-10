@extends('layouts.app-admin')
@section('title', 'Sponsor')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="ms-3">Sponsor</h1>
        <a href="{{ route('sponsor.create') }}" class="btn btn-primary">Tambah Sponsor</a>
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
                        <th>Email</th>
                        <th>Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $sponsor)
                        <tr>
                            <td>{{ Str::title(strtolower($sponsor->nama_sponsor)) }}</td>
                            <td>{{ $sponsor->email_sponsor }}</td>
                            <td>{{ Str::title(strtolower($sponsor->kegiatan_sponsor)) }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modalSponsor{{ $sponsor->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
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
    <!-- Modal Detail Sponsor -->
    @foreach ($sponsors as $sponsor)
        <div class="modal fade" id="modalSponsor{{ $sponsor->id }}" tabindex="-1"
            aria-labelledby="modalSponsorLabel{{ $sponsor->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="modalSponsorLabel{{ $sponsor->id }}">Detail Sponsor</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Sponsor</th>
                                <td>{{ Str::title(strtolower($sponsor->nama_sponsor)) }}</td>
                            </tr>
                            <tr>
                                <th>Email Sponsor</th>
                                <td>{{ $sponsor->email_sponsor }}</td>
                            </tr>
                            <tr>
                                <th>Kegiatan Sponsor</th>
                                <td>{{ Str::title(strtolower($sponsor->kegiatan_sponsor)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
