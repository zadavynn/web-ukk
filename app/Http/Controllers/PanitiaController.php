<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanitiaController extends Controller
{
    public function index()
    {
        // Ambil panitia
        $panitias = DB::table('panitias')->get();

        return view('admin.panitia.index', compact('panitias'));
    }

    public function create()
    {
        $kelasList = [
            'X RPL',
            'X TKJ',
            'XI RPL',
            'XI TKJ',
            'XII RPL',
            'XII TKJ'
        ];

        $jabatanList = [
            'ketua',
            'wakil_ketua',
            'sekretaris',
            'bendahara',
            'anggota'
        ];

        return view('admin.panitia.create', compact('kelasList', 'jabatanList'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jabatan' => 'required|string',
            'quotes' => 'required|string',
        ]);

        // Simpan panitia
        DB::table('panitias')->insert([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'telepon' => $request->telepon,
            'jabatan' => $request->jabatan,
            'quotes' => $request->quotes,
        ]);

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dibuat.');
    }

    public function edit($id)
    {
        // Ambil data
        $panitia = DB::table('panitias')->where('id', $id)->first();

        $kelasList = [
            'X RPL',
            'X TKJ',
            'XI RPL',
            'XI TKJ',
            'XII RPL',
            'XII TKJ'
        ];

        $jabatanList = [
            'ketua',
            'wakil_ketua',
            'sekretaris',
            'bendahara',
            'anggota'
        ];

        return view('admin.panitia.edit', compact('panitia'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jabatan' => 'required|string',
            'quotes' => 'required|string',
        ]);

        // Update panitia
        DB::table('panitias')->where('id', $id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'telepon' => $request->telepon,
            'jabatan' => $request->jabatan,
            'quotes' => $request->quotes,
        ]);

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus panitia
        DB::table('panitias')->where('id', $id)->delete();

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dihapus.');
    }
}
