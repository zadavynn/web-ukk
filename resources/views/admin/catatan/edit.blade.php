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
                    <label for="kegiatan_id" class="form-label">Kegiatan</label>
                    <select class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                        <option value="">Pilih Kegiatan</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{ $kegiatan->id }}"
                                {{ $catatan->kegiatan_id == $kegiatan->id ? 'selected' : '' }}>{{ $kegiatan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control" id="catatan" name="catatan" rows="4" required>{{ $catatan->catatan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
