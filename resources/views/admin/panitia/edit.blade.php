@extends('layouts.app-admin')
@section('title', 'Edit Panitia')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Panitia</h1>
        <a href="{{ route('panitia.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('panitia.update', $panitia->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Panitia</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $panitia->nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $panitia->email }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $panitia->telepon }}"
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
                    <label class="form-label">Kegiatan Terlibat</label>
                    <div class="row">
                        @foreach ($kegiatans as $kegiatan)
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="kegiatan_ids[]"
                                        value="{{ $kegiatan->id }}" id="kegiatan{{ $kegiatan->id }}"
                                        {{ in_array($kegiatan->id, $panitia->selected_kegiatans ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kegiatan{{ $kegiatan->id }}">
                                        {{ $kegiatan->nama }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection
