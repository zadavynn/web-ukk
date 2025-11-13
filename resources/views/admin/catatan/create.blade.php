@extends('layouts.app-admin')
@section('title', 'Membuat Catatan')
@section('content')
    <h1>Buat Catatan Baru</h1>
    <p>Selamat datang di halaman untuk membuat Catatan baru di SMK Syafi'i Akrom.</p>
    <a href="{{ route('catatan') }}" class="btn btn-outline-secondary">Kembali</a>
@endsection
