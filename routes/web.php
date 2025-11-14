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
Route::resource('absensi', AbsensiController::class);

// halaman catatan admin
Route::resource('catatan', CatatanController::class);

// halaman kegiatan admin
Route::resource('kegiatan', KegiatanController::class);
Route::post('/kegiatan/{id}/finish', [KegiatanController::class, 'finish'])->name('kegiatan.finish');

// halaman panitia admin
Route::resource('panitia', PanitiaController::class);

// halaman sponsor admin
Route::resource('sponsor', SponsorController::class);
