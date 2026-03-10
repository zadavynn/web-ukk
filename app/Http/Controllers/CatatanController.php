<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanController extends Controller
{
    public function index()
    {
        // Ambil catatan
        $catatans = DB::table('catatans')->get();

        // Tampil halaman
        return view('admin.catatan.index', compact('catatans'));
    }

    public function create()
    {
        // Form tambah
        return view('admin.catatan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kegiatan' => 'required|string',
            'catatan' => 'required|string',
        ]);

        // Simpan data
        DB::table('catatans')->insert([
            'kegiatan' => $request->kegiatan,
            'catatan' => $request->catatan,
        ]);

        // Redirect index
        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dibuat.');
    }

    public function edit($id)
    {
        // Ambil data
        $catatan = DB::table('catatans')->where('id', $id)->first();

        // Form edit
        return view('admin.catatan.edit', compact('catatan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kegiatan' => 'required|string',
            'catatan' => 'required|string',
        ]);

        // Update data
        DB::table('catatans')->where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'catatan' => $request->catatan,
        ]);

        // Redirect index
        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data
        DB::table('catatans')->where('id', $id)->delete();

        // Redirect index
        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
