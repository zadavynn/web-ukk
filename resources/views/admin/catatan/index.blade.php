@extends('layouts.app-admin')
@section('title', 'Catatan Admin')
@section('content')
    <h1>Catatan Admin</h1>
    <p>Selamat datang di halaman Catatan Admin SMK Syafi'i Akrom.</p>
    <a href="{{ route('catatan.create') }}" class="btn btn-outline-info">Halaman Buat Catatan</a>
    <a href="{{ route('catatan.edit') }}" class="btn btn-outline-primary">Halaman Edit Catatan</a>
@endsection
