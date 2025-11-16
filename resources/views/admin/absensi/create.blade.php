@extends('layouts.app-admin')
@section('title', 'Tambah Absensi')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Absensi</h1>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kegiatan_id" class="form-label">Kegiatan</label>
                    <select class="form-control" id="kegiatan_id" name="kegiatan_id" required onchange="filterPanitia()">
                        <option value="">Pilih Kegiatan</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="panitia_id" class="form-label">Panitia</label>
                    <select class="form-control" id="panitia_id" name="panitia_id" required>
                        <option value="">Pilih Kegiatan terlebih dahulu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="hadir">Hadir</option>
                        <option value="tidak_hadir">Tidak Hadir</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function filterPanitia() {
            const kegiatanId = document.getElementById('kegiatan_id').value;
            const panitiaSelect = document.getElementById('panitia_id');

            if (!kegiatanId) {
                panitiaSelect.innerHTML = '<option value="">Pilih Kegiatan terlebih dahulu</option>';
                return;
            }

            // Fetch panitia yang belum absen untuk kegiatan ini
            fetch(`/admin/absensi/get-available-panitia/${kegiatanId}`)
                .then(response => response.json())
                .then(data => {
                    panitiaSelect.innerHTML = '<option value="">Pilih Panitia</option>';
                    data.forEach(panitia => {
                        const option = document.createElement('option');
                        option.value = panitia.id;
                        option.textContent = panitia.nama;
                        panitiaSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    panitiaSelect.innerHTML = '<option value="">Error loading panitia</option>';
                });
        }
    </script>
@endsection
