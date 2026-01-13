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
                        <th>Email</th>
                        <th>Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $sponsor)
                        <tr>
                            <td>{{ $sponsor->nama_sponsor }}</td>
                            <td>{{ $sponsor->email_sponsor }}</td>
                            <td>{{ $sponsor->kegiatan_sponsor }}</td>
                            <td>
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
@endsection
