@extends('layouts.app-admin')
@section('title', 'Edit Sponsor')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Sponsor</h1>
        <a href="{{ route('sponsor.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sponsor.update', $sponsor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_sponsor" class="form-label">Nama Sponsor</label>
                    <input type="text" class="form-control" id="nama_sponsor" name="nama_sponsor"
                        value="{{ $sponsor->nama_sponsor }}" required>
                </div>
                <div class="mb-3">
                    <label for="email_sponsor" class="form-label">Email Sponsor</label>
                    <input type="email" class="form-control" id="email_sponsor" name="email_sponsor"
                        value="{{ $sponsor->email_sponsor }}" required>
                </div>
                <div class="mb-3">
                    <label for="kegiatan_sponsor" class="form-label">Kegiatan Disponsori</label>
                    <input type="text" class="form-control" id="kegiatan_sponsor" name="kegiatan_sponsor"
                        value="{{ $sponsor->kegiatan_sponsor }}">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection
