<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\SponsorController;

Route::get('/', [AdminController::class, 'index'])->name('admin');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan');
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
Route::get('/panitia', [PanitiaController::class, 'index'])->name('panitia');
Route::get('/sponsor', [SponsorController::class, 'index'])->name('sponsor');
