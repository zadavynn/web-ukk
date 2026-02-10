@extends('layouts.app-admin')
@section('title', 'Edit Catatan')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Catatan</h1>
        <a href="{{ route('catatan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('catatan.update', $catatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{ $catatan->kegiatan }}" required>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control" id="catatan" name="catatan" rows="4" required>{{ $catatan->catatan }}</textarea>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection
