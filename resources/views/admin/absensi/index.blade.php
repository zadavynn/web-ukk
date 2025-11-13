@extends('layouts.app-admin')
@section('title', 'Absensi Admin')
@section('content')
    <h1>Absensi Admin</h1>
    <p>Selamat datang di halaman Absensi Admin Admin SMK Syafi'i Akrom.</p>
    <a href="{{ route('absensi.create') }}" class="btn btn-outline-info">Halaman Buat Absensi</a>
    <a href="{{ route('absensi.edit') }}" class="btn btn-outline-primary">Halaman Edit Absensi</a>
@endsection
