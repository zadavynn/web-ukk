@extends('layouts.app-admin')
@section('title', 'Tambah Absensi')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Absensi Siswa</h1>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" class="form-control" name="kegiatan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas" class="form-select" required>
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas }}">{{ $kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Hadir</label>
                    <input type="number" name="jumlah_hadir" class="form-control" min="0" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
