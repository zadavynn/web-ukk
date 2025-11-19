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
Route::get('absensi', [AbsensiController::class, 'index']);
Route::post('absensi', [AbsensiController::class, 'store']);
Route::put('absensi/{id}', [AbsensiController::class, 'update']);
Route::delete('absensi/{id}', [AbsensiController::class, 'destroy']);
Route::get('/admin/absensi/get-available-panitia/{kegiatanId}', [AbsensiController::class, 'getAvailablePanitia'])->name('absensi.available-panitia');

// halaman catatan admin
Route::get('catatan', [CatatanController::class, 'index']);
Route::post('catatan', [CatatanController::class, 'store']);
Route::put('catatan/{id}', [CatatanController::class, 'update']);
Route::delete('catatan/{id}', [CatatanController::class, 'destroy']);

// halaman kegiatan admin
Route::get('kegiatan', [KegiatanController::class, 'index']);
Route::post('kegiatan', [KegiatanController::class, 'store']);
Route::put('kegiatan/{id}', [KegiatanController::class, 'update']);
Route::delete('kegiatan/{id}', [KegiatanController::class, 'destroy']);
Route::post('/kegiatan/{id}/finish', [KegiatanController::class, 'finish'])->name('kegiatan.finish');

// halaman panitia admin
Route::get('panitia', [PanitiaController::class, 'index']);
Route::post('panitia', [PanitiaController::class, 'store']);
Route::put('panitia/{id}', [PanitiaController::class, 'update']);
Route::delete('panitia/{id}', [PanitiaController::class, 'destroy']);

// halaman sponsor admin
Route::get('sponsor', [SponsorController::class, 'index']);
Route::post('sponsor', [SponsorController::class, 'store']);
Route::put('sponsor/{id}', [SponsorController::class, 'update']);
Route::delete('sponsor/{id}', [SponsorController::class, 'destroy']);
