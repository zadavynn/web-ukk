@extends('layouts.app-admin')
@section('title', 'Edit Absensi')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Absensi</h1>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kegiatan_id" class="form-label">Kegiatan</label>
                    <select class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                        <option value="">Pilih Kegiatan</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{ $kegiatan->id }}"
                                {{ $absensi->kegiatan_id == $kegiatan->id ? 'selected' : '' }}>{{ $kegiatan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X RPL" {{ $absensi->kelas == 'X RPL' ? 'selected' : '' }}>X RPL</option>
                        <option value="X TKJ" {{ $absensi->kelas == 'X TKJ' ? 'selected' : '' }}>X TKJ</option>
                        <option value="XI RPL" {{ $absensi->kelas == 'XI RPL' ? 'selected' : '' }}>XI RPL</option>
                        <option value="XI TKJ" {{ $absensi->kelas == 'XI TKJ' ? 'selected' : '' }}>XI TKJ</option>
                        <option value="XII RPL" {{ $absensi->kelas == 'XII RPL' ? 'selected' : '' }}>XII RPL</option>
                        <option value="XII TKJ" {{ $absensi->kelas == 'XII TKJ' ? 'selected' : '' }}>XII TKJ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_hadir" class="form-label">Jumlah Hadir</label>
                    <input type="number" class="form-control" id="jumlah_hadir" name="jumlah_hadir"
                        value="{{ $absensi->jumlah_hadir }}" required min="0">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
