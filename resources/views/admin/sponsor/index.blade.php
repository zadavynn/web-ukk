@extends('layouts.app-admin')
@section('title', 'Sponsor Admin')
@section('content')
    <h1>Sponsor Admin</h1>
    <p>Selamat datang di halaman Sponsor Admin SMK Syafi'i Akrom.</p>
    <a href="{{ route('sponsor.create') }}" class="btn btn-outline-info">Halaman Buat Sponsor</a>
    <a href="{{ route('sponsor.edit') }}" class="btn btn-outline-primary">Halaman Edit Sponsor</a>
@endsection
