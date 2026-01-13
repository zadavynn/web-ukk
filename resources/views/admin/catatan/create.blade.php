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
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control" id="catatan" name="catatan" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
