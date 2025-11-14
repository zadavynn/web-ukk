@extends('layouts.app-admin')
@section('title', 'Tambah Sponsor')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Sponsor</h1>
        <a href="{{ route('sponsor.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('sponsor.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Sponsor</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_sponsorship" class="form-label">Jenis Sponsorship</label>
                    <input type="text" class="form-control" id="jenis_sponsorship" name="jenis_sponsorship" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kegiatan Disponsori</label>
                    <div class="row">
                        @foreach ($kegiatans as $kegiatan)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="kegiatan_ids[]"
                                        value="{{ $kegiatan->id }}" id="kegiatan{{ $kegiatan->id }}">
                                    <label class="form-check-label" for="kegiatan{{ $kegiatan->id }}">
                                        {{ $kegiatan->nama }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
