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
        // Ambil kegiatan
        $kegiatans = DB::table('kegiatans')->get();

        return view('admin.panitia.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|in:X RPL,X TKJ,XI RPL,XI TKJ,XII RPL,XII TKJ',
            'telepon' => 'required|string|max:20',
            'jabatan' => 'required|in:ketua,wakil_ketua,bendahara,sekretaris,anggota',
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

        return view('admin.panitia.edit', compact('panitia'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|in:X RPL,X TKJ,XI RPL,XI TKJ,XII RPL,XII TKJ',
            'telepon' => 'required|string|max:20',
            'jabatan' => 'required|in:ketua,wakil_ketua,bendahara,sekretaris,anggota',
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
