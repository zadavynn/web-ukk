@extends('layouts.app-admin')
@section('title', 'Tambah Panitia')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Panitia</h1>
        <a href="{{ route('panitia.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('panitia.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Panitia</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select" id="jabatan" name="jabatan" required>
                        <option value="">Pilih Jabatan</option>
                        <option value="ketua">Ketua</option>
                        <option value="wakil_ketua">Wakil Ketua</option>
                        <option value="bendahara">Bendahara</option>
                        <option value="sekretaris">Sekretaris</option>
                        <option value="anggota">Anggota</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kegiatan Terlibat</label>
                    <div class="row">
                        @foreach ($kegiatans as $kegiatan)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="kegiatan_ids[]"
                                        value="{{ $kegiatan->id }}" id="kegiatan{{ $kegiatan->id }}">
                                    <label class="form-check-label" for="kegiatan{{ $kegiatan->id }}">
                                        {{ $kegiatan->nama }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
