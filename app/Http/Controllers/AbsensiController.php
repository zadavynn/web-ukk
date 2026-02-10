<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = DB::table('absensis')->get();

        return view('admin.absensi.index', compact('absensis'));
    }

    public function create()
    {
        // list kelas
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

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string',
            'kelas' => 'required|string',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        // Cek apakah kelas tersebut sudah absen pada kegiatan itu
        $exists = DB::table('absensis')
            ->where('kegiatan', $request->kegiatan)
            ->where('kelas', $request->kelas)
            ->exists();

        DB::table('absensis')->insert([
            'kegiatan' => $request->kegiatan,
            'kelas' => $request->kelas,
            'jumlah_hadir' => $request->jumlah_hadir,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required|string',
            'kelas' => 'required|string',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        // Cek apabila update menyebabkan duplikat
        $exists = DB::table('absensis')
            ->where('kegiatan', $request->kegiatan)
            ->where('kelas', $request->kelas)
            ->where('id', '!=', $id)
            ->exists();

        DB::table('absensis')->where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'kelas' => $request->kelas,
            'jumlah_hadir' => $request->jumlah_hadir,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('absensis')->where('id', $id)->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
