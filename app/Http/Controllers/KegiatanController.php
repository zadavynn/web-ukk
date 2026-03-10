<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {
        // Ambil kegiatan
        $kegiatans = DB::table('kegiatans')->get();

        // Tampil halaman
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        // Form tambah
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required|string|max:255',
        ]);

        // Simpan kegiatan
        $id = DB::table('kegiatans')->insertGetId([
            'nama' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal_kegiatan,
            'lokasi' => $request->lokasi_kegiatan,
            'status' => 'belum_selesai',
        ]);

        // Redirect index
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dibuat.');
    }

    public function edit($id)
    {
        // Ambil data
        $kegiatan = DB::table('kegiatans')->where('id', $id)->first();

        // Form edit
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required|string|max:255',
        ]);

        // Update kegiatan
        DB::table('kegiatans')->where('id', $id)->update([
            'nama' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal_kegiatan,
            'lokasi' => $request->lokasi_kegiatan,
        ]);

        // Redirect index
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus kegiatan
        DB::table('kegiatans')->where('id', $id)->delete();

        // Redirect index
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function finish($id)
    {
        // Ubah status
        DB::table('kegiatans')->where('id', $id)->update(['status' => 'selesai']);

        // Redirect index
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diselesaikan.');
    }
}
