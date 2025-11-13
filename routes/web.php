<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\AuthController;

// halaman login admin
Route::get('/', [AuthController::class, 'index'])->name('user');
Route::get('/auth', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('proses');

// dashboard admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');

// halaman absensi admin
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::get('/absensi/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');

// halaman catatan admin
Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan');
Route::get('/catatan/create', [CatatanController::class, 'create'])->name('catatan.create');
Route::get('/catatan/edit', [CatatanController::class, 'edit'])->name('catatan.edit');

// halaman kegiatan admin
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::get('/kegiatan/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');

// halaman panitia admin
Route::get('/panitia', [PanitiaController::class, 'index'])->name('panitia');
Route::get('/panitia/create', [PanitiaController::class, 'create'])->name('panitia.create');
Route::get('/panitia/edit', [PanitiaController::class, 'edit'])->name('panitia.edit');

// halaman sponsor admin
Route::get('/sponsor', [SponsorController::class, 'index'])->name('sponsor');
Route::get('/sponsor/create', [SponsorController::class, 'create'])->name('sponsor.create');
Route::get('/sponsor/edit', [SponsorController::class, 'edit'])->name('sponsor.edit');
