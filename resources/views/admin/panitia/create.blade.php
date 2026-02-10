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
                    <label for="sosmed" class="form-label">Sosmed</label>
                    <input type="text" class="form-control" id="sosmed" name="sosmed" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="mb-3">
                    <label for="quotes" class="form-label">Quotes</label>
                    <input type="text" class="form-control" id="quotes" name="quotes" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
