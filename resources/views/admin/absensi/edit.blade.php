@extends('layouts.app-admin')
@section('title', 'Edit Absensi')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Absensi Siswa</h1>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control" required value="{{ $absensi->kegiatan }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas" class="form-select" required>
                        @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas }}" {{ $kelas == $absensi->kelas ? 'selected' : '' }}>
                                {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Hadir</label>
                    <input type="number" name="jumlah_hadir" class="form-control" value="{{ $absensi->jumlah_hadir }}"
                        required>
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection
