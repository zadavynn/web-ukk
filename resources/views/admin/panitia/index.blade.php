@extends('layouts.app-admin')
@section('title', 'Panitia Admin')
@section('content')
    <h1>Panitia Admin</h1>
    <p>Selamat datang di halaman Panitia Admin SMK Syafi'i Akrom.</p>
    <a href="{{ route('panitia.create') }}" class="btn btn-outline-info">Halaman Buat Panitia</a>
    <a href="{{ route('panitia.edit') }}" class="btn btn-outline-primary">Halaman Edit Panitia</a>
@endsection
