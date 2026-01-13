<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = DB::table('kegiatans')->get();
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required|string|max:255',
        ]);

        $id = DB::table('kegiatans')->insertGetId([
            'nama' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal_kegiatan,
            'lokasi' => $request->lokasi_kegiatan,
            'status' => 'belum_selesai',
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dibuat.');
    }

    public function edit($id)
    {
        $kegiatan = DB::table('kegiatans')->where('id', $id)->first();
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required|string|max:255',
        ]);

        DB::table('kegiatans')->where('id', $id)->update([
            'nama' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal_kegiatan,
            'lokasi' => $request->lokasi_kegiatan,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('kegiatans')->where('id', $id)->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function finish($id)
    {
        DB::table('kegiatans')->where('id', $id)->update(['status' => 'selesai']);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diselesaikan.');
    }
}
