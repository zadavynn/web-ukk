@extends('layouts.app-admin')
@section('title', 'Kegiatan Admin')
@section('content')
    <h1>Kegiatan Admin</h1>
    <p>Selamat datang di halaman Kegiatan Admin SMK Syafi'i Akrom.</p>
    <a href="{{ route('kegiatan.create') }}" class="btn btn-outline-info">Halaman Buat Kegiatan</a>
    <a href="{{ route('kegiatan.edit') }}" class="btn btn-outline-primary">Halaman Edit Kegiatan</a>
@endsection
