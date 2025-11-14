<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Panitia;
use App\Models\Sponsor;
use App\Models\Absensi;
use App\Models\Catatan;

class AdminController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return response('<h1 style="text-align:center; margin-top:100px;">Mohon maaf yang anda tuju tidak ditemukan</h1>');
        }

        // Get statistics
        $totalKegiatan = Kegiatan::count();
        $totalPanitia = Panitia::count();
        $totalPeserta = Absensi::count();
        $totalSponsor = Sponsor::count();
        $totalCatatan = Catatan::count();

        // Get latest 3 kegiatan
        $latestKegiatans = Kegiatan::with(['panitias', 'sponsors', 'absensis'])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('admin.index', compact(
            'totalKegiatan',
            'totalPanitia',
            'totalPeserta',
            'totalSponsor',
            'totalCatatan',
            'latestKegiatans'
        ));
    }
    public function logout(Request $request)
    {
        // hapus semua session
        $request->session()->flush();

        // arahkan balik ke halaman login
        return redirect()->route('user'); // ganti sesuai route login admin kamu
    }
}
