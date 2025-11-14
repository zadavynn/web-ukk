@extends('layouts.app-admin')
@section('title', 'Tambah Absensi')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Absensi</h1>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kegiatan_id" class="form-label">Kegiatan</label>
                    <select class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                        <option value="">Pilih Kegiatan</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X RPL">X RPL</option>
                        <option value="X TKJ">X TKJ</option>
                        <option value="XI RPL">XI RPL</option>
                        <option value="XI TKJ">XI TKJ</option>
                        <option value="XII RPL">XII RPL</option>
                        <option value="XII TKJ">XII TKJ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_hadir" class="form-label">Jumlah Hadir</label>
                    <input type="number" class="form-control" id="jumlah_hadir" name="jumlah_hadir" required
                        min="0">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
