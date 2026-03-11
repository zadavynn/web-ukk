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
        // Ambil kegiatan
        $kegiatans = DB::table('kegiatans')
            ->where('status', '!=', 'selesai') // Filter status
            ->orderBy('tanggal', 'asc') // Urut tanggal
            ->get();

        // Ambil panitia
        $panitias = DB::table('panitias')->get();

        // Ambil sponsor
        $sponsors = DB::table('sponsors')->get();

        return view('user.index', compact('kegiatans', 'panitias', 'sponsors'));
    }

    public function login()
    {
        return view('user.login');
    }

    // Data admin
    private function getUser(): array
    {
        return [
            'username' => 'admin',
            'password' => '$2y$12$/4Ftk2cnlROzFHvpUS1yQOp7yN2YJLR.5F8pCWbMEoEnzY7j6VEx2', // password: admin123
        ];
    }

    public function loginProses(Request $request)
    {
        // Validasi login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil input
        $auth = $request->only('username', 'password');

        // Ambil user
        $user = $this->getUser();

        // Cek login
        if (
            $user['username'] === $auth['username'] &&
            Hash::check($auth['password'], $user['password'])
        ) {
            Session::put('user', $user);

            // Redirect admin
            return redirect()->route('admin.dashboard');
        }

        // Login gagal
        return back()->withErrors(['username' => 'Username atau password salah!']);
    }
}
