<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        // Get kegiatan yang belum selesai
        $kegiatans = DB::table('kegiatans')
            ->where('status', '!=', 'selesai')
            ->orderBy('tanggal', 'asc')
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
                return $kegiatan;
            });

        // Get all panitia
        $panitias = DB::table('panitias')->get();

        // Get all sponsors
        $sponsors = DB::table('sponsors')->get();

        // Get kegiatan yang sudah selesai untuk form catatan
        $kegiatansSelesai = DB::table('kegiatans')
            ->where('status', 'selesai')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.index', compact('kegiatans', 'panitias', 'sponsors', 'kegiatansSelesai'));
    }

    public function login()
    {
        return view('user.login');
    }
    private function getUser(): array
    {
        return [
            'username' => 'admin',
            'password' => '$2y$12$/4Ftk2cnlROzFHvpUS1yQOp7yN2YJLR.5F8pCWbMEoEnzY7j6VEx2', // password: admin123
        ];
    }
    public function loginProses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $auth = $request->only('username', 'password');

        $user = $this->getUser();
        if (
            $user['username'] === $auth['username'] &&
            Hash::check($auth['password'], $user['password'])
        ) {
            Session::put('user', $user);
            return redirect()->route('admin');
        }

        return back()->withErrors(['username' => 'Username atau password salah!']);
    }
}
