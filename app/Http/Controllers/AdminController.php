<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return response('<h1 style="text-align:center; margin-top:100px;">Mohon maaf yang anda tuju tidak ditemukan</h1>');
        }
        return view('admin.index');
    }
    public function logout(Request $request)
    {
        // hapus semua session
        $request->session()->flush();

        // arahkan balik ke halaman login
        return redirect()->route('user'); // ganti sesuai route login admin kamu
    }
}
