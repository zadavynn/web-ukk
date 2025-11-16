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
                    <label for="panitia_id" class="form-label">Panitia</label>
                    <select class="form-control" id="panitia_id" name="panitia_id" required>
                        <option value="">Pilih Panitia</option>
                        @foreach ($panitias as $panitia)
                            <option value="{{ $panitia->id }}"
                                {{ $absensi->panitia_id == $panitia->id ? 'selected' : '' }}>{{ $panitia->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="hadir" {{ $absensi->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="tidak_hadir" {{ $absensi->status == 'tidak_hadir' ? 'selected' : '' }}>Tidak Hadir
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $absensi->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
