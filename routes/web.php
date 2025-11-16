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
Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('absensi', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('absensi/{id}', [AbsensiController::class, 'show'])->name('absensi.show');
Route::get('absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::delete('absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

// halaman catatan admin
Route::get('catatan', [CatatanController::class, 'index'])->name('catatan.index');
Route::get('catatan/create', [CatatanController::class, 'create'])->name('catatan.create');
Route::post('catatan', [CatatanController::class, 'store'])->name('catatan.store');
Route::get('catatan/{id}', [CatatanController::class, 'show'])->name('catatan.show');
Route::get('catatan/{id}/edit', [CatatanController::class, 'edit'])->name('catatan.edit');
Route::put('catatan/{id}', [CatatanController::class, 'update'])->name('catatan.update');
Route::delete('catatan/{id}', [CatatanController::class, 'destroy'])->name('catatan.destroy');

// halaman kegiatan admin
Route::get('kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::get('kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
Route::post('/kegiatan/{id}/finish', [KegiatanController::class, 'finish'])->name('kegiatan.finish');

// halaman panitia admin
Route::get('panitia', [PanitiaController::class, 'index'])->name('panitia.index');
Route::get('panitia/create', [PanitiaController::class, 'create'])->name('panitia.create');
Route::post('panitia', [PanitiaController::class, 'store'])->name('panitia.store');
Route::get('panitia/{id}', [PanitiaController::class, 'show'])->name('panitia.show');
Route::get('panitia/{id}/edit', [PanitiaController::class, 'edit'])->name('panitia.edit');
Route::put('panitia/{id}', [PanitiaController::class, 'update'])->name('panitia.update');
Route::delete('panitia/{id}', [PanitiaController::class, 'destroy'])->name('panitia.destroy');

// halaman sponsor admin
Route::get('sponsor', [SponsorController::class, 'index'])->name('sponsor.index');
Route::get('sponsor/create', [SponsorController::class, 'create'])->name('sponsor.create');
Route::post('sponsor', [SponsorController::class, 'store'])->name('sponsor.store');
Route::get('sponsor/{id}', [SponsorController::class, 'show'])->name('sponsor.show');
Route::get('sponsor/{id}/edit', [SponsorController::class, 'edit'])->name('sponsor.edit');
Route::put('sponsor/{id}', [SponsorController::class, 'update'])->name('sponsor.update');
Route::delete('sponsor/{id}', [SponsorController::class, 'destroy'])->name('sponsor.destroy');
