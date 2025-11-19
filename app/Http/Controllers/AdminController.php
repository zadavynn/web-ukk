<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return response('<h1 style="text-align:center; margin-top:100px;">Mohon maaf yang anda tuju tidak ditemukan</h1>');
        }

        // Get statistics
        $totalKegiatan = DB::table('kegiatans')->count();
        $totalPanitia = DB::table('panitias')->count();
        $totalPeserta = DB::table('absensis')->count();
        $totalSponsor = DB::table('sponsors')->count();
        $totalCatatan = DB::table('catatans')->count();

        // Get latest 3 kegiatan with relationships, prioritizing unfinished
        $latestKegiatans = DB::table('kegiatans')
            ->orderByRaw("CASE WHEN status != 'selesai' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($kegiatan) {
                $kegiatan->panitias = DB::table('kegiatan_panitia')
                    ->join('panitias', 'kegiatan_panitia.panitia_id', '=', 'panitias.id')
                    ->where('kegiatan_panitia.kegiatan_id', $kegiatan->id)
                    ->pluck('panitias.nama')
                    ->toArray();
                $kegiatan->sponsors = DB::table('kegiatan_sponsor')
                    ->join('sponsors', 'kegiatan_sponsor.sponsor_id', '=', 'sponsors.id')
                    ->where('kegiatan_sponsor.kegiatan_id', $kegiatan->id)
                    ->pluck('sponsors.nama_sponsor')
                    ->toArray();
                $kegiatan->absensis = DB::table('absensis')
                    ->where('kegiatan_id', $kegiatan->id)
                    ->count();
                return $kegiatan;
            });

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
