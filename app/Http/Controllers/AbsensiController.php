<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    // Tampil absensi
    public function index()
    {
        $absensis = DB::table('absensis')->get();

        return view('admin.absensi.index', compact('absensis'));
    }

    // Form tambah
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

        return view('admin.absensi.create', compact('kelasList'));
    }

    // Simpan absensi
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kegiatan' => 'required|string',
            'kelas' => 'required|string',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        // Insert data
        DB::table('absensis')->insert([
            'kegiatan' => $request->kegiatan,
            'kelas' => $request->kelas,
            'jumlah_hadir' => $request->jumlah_hadir,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi siswa berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        // Ambil data
        $absensi = DB::table('absensis')->where('id', $id)->first();

        $kelasList = [
            'X RPL',
            'X TKJ',
            'XI RPL',
            'XI TKJ',
            'XII RPL',
            'XII TKJ'
        ];

        return view('admin.absensi.edit', compact('absensi', 'kelasList'));
    }

    // Update absensi
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kegiatan' => 'required|string',
            'kelas' => 'required|string',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        // Update data
        DB::table('absensis')->where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'kelas' => $request->kelas,
            'jumlah_hadir' => $request->jumlah_hadir,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi siswa berhasil diperbarui.');
    }

    // Hapus absensi
    public function destroy($id)
    {
        DB::table('absensis')->where('id', $id)->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
