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
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                        value="{{ $kegiatan->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_kegiatan" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan"
                        value="{{ $kegiatan->tanggal->format('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="lokasi_kegiatan" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan"
                        value="{{ $kegiatan->lokasi }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Panitia Terlibat</label>
                    <div class="row">
                        @foreach ($panitias as $panitia)
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="panitia_ids[]"
                                        value="{{ $panitia->id }}" id="panitia{{ $panitia->id }}"
                                        {{ in_array($panitia->id, $selected_panitias) ? 'checked' : '' }}>
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
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sponsor_ids[]"
                                        value="{{ $sponsor->id }}" id="sponsor{{ $sponsor->id }}"
                                        {{ in_array($sponsor->id, $selected_sponsors) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sponsor{{ $sponsor->id }}">
                                        {{ $sponsor->nama_sponsor }}
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
