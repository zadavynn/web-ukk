<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Cek session
        if (!session()->has('user')) {
            return response('<h1 style="text-align:center; margin-top:100px;">Mohon maaf,🙏 yang anda tuju tidak dapat diakses😉</h1>');
        }

        // Hitung data
        $totalKegiatan = DB::table('kegiatans')->count();
        $totalPanitia = DB::table('panitias')->count();
        $totalPeserta = DB::table('absensis')->count();
        $totalSponsor = DB::table('sponsors')->count();
        $totalCatatan = DB::table('catatans')->count();

        // Ambil kegiatan
        $latestKegiatans = DB::table('kegiatans')
            ->orderByRaw("status = 'selesai'") // Urut status
            ->orderBy('tanggal', 'desc') // Urut tanggal
            ->take(3) // Batasi data
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
        $request->session()->flush();

        return redirect()->route('home');
    }
}
