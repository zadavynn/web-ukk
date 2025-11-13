@extends('layouts.app-admin')
@section('title', 'Membuat Absensi')
@section('content')
    <h1>Buat Absensi Baru</h1>
    <p>Selamat datang di halaman untuk membuat absensi baru di SMK Syafi'i Akrom.</p>
    <a href="{{ route('absensi') }}" class="btn btn-outline-secondary">Kembali</a>
@endsection
