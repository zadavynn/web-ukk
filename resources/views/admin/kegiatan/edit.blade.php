@extends('layouts.app-admin')
@section('title', 'Edit Kegiatan')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Kegiatan</h1>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $kegiatan->nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $kegiatan->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        value="{{ $kegiatan->tanggal->format('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Panitia Terlibat</label>
                    <div class="row">
                        @foreach ($panitias as $panitia)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="panitia_ids[]"
                                        value="{{ $panitia->id }}" id="panitia{{ $panitia->id }}"
                                        {{ $kegiatan->panitias->contains($panitia->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="panitia{{ $panitia->id }}">
                                        {{ $panitia->nama }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sponsor Kerjasama</label>
                    <div class="row">
                        @foreach ($sponsors as $sponsor)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sponsor_ids[]"
                                        value="{{ $sponsor->id }}" id="sponsor{{ $sponsor->id }}"
                                        {{ $kegiatan->sponsors->contains($sponsor->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sponsor{{ $sponsor->id }}">
                                        {{ $sponsor->nama }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
