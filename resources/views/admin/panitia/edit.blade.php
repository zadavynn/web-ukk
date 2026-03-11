@extends('layouts.app-admin')
@section('title', 'Edit Panitia')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Panitia</h1>
        <a href="{{ route('panitia.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('panitia.update', $panitia->id) }}" method="POST">
                {{-- token keamanan --}}
                @csrf
                {{-- method put --}}
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Panitia</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $panitia->nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select" id="jabatan" name="jabatan" required>
                        <option value="">Pilih Jabatan</option>
                        <option value="ketua" {{ $panitia->jabatan == 'ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="wakil_ketua" {{ $panitia->jabatan == 'wakil_ketua' ? 'selected' : '' }}>Wakil Ketua
                        </option>
                        <option value="bendahara" {{ $panitia->jabatan == 'bendahara' ? 'selected' : '' }}>Bendahara
                        </option>
                        <option value="sekretaris" {{ $panitia->jabatan == 'sekretaris' ? 'selected' : '' }}>Sekretaris
                        </option>
                        <option value="anggota" {{ $panitia->jabatan == 'anggota' ? 'selected' : '' }}>Anggota</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X RPL" {{ $panitia->kelas == 'X RPL' ? 'selected' : '' }}>X RPL</option>
                        <option value="X TKJ" {{ $panitia->kelas == 'X TKJ' ? 'selected' : '' }}>X TKJ</option>
                        <option value="XI RPL" {{ $panitia->kelas == 'XI RPL' ? 'selected' : '' }}>XI RPL</option>
                        <option value="XI TKJ" {{ $panitia->kelas == 'XI TKJ' ? 'selected' : '' }}>XI TKJ</option>
                        <option value="XII RPL" {{ $panitia->kelas == 'XII RPL' ? 'selected' : '' }}>XII RPL</option>
                        <option value="XII TKJ" {{ $panitia->kelas == 'XII TKJ' ? 'selected' : '' }}>XII TKJ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon"
                        value="{{ $panitia->telepon }}" required>
                </div>
                <div class="mb-3">
                    <label for="quotes" class="form-label">Quotes</label>
                    <input type="text" class="form-control" id="quotes" name="quotes" value="{{ $panitia->quotes }}"
                        required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection
