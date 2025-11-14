@extends('layouts.app-admin')
@section('title', 'Tambah Catatan')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Catatan</h1>
        <a href="{{ route('catatan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('catatan.store') }}" method="POST">
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
                    <label for="evaluasi" class="form-label">Evaluasi</label>
                    <textarea class="form-control" id="evaluasi" name="evaluasi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="perbaikan" class="form-label">Perbaikan</label>
                    <textarea class="form-control" id="perbaikan" name="perbaikan" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
