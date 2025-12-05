<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = DB::table('absensis')
            ->join('kegiatans', 'absensis.kegiatan_id', '=', 'kegiatans.id')
            ->select('absensis.*', 'kegiatans.nama as kegiatan_nama')
            ->get();

        return view('admin.absensi.index', compact('absensis'));
    }

    public function create()
    {
        $kegiatans = DB::table('kegiatans')->get();

        // list kelas
        $kelasList = [
            'X RPL',
            'X TKJ',
            'XI RPL',
            'XI TKJ',
            'XII RPL',
            'XII TKJ'
        ];

        // default: tidak filter kelas kalau kegiatan belum dipilih
        $availableKelas = $kelasList;

        return view('admin.absensi.create', compact('kegiatans', 'kelasList', 'availableKelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'kelas' => 'required|string',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        // Cek apakah kelas tersebut sudah absen pada kegiatan itu
        $exists = DB::table('absensis')
            ->where('kegiatan_id', $request->kegiatan_id)
            ->where('kelas', $request->kelas)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Kelas ini sudah mengisi absensi untuk kegiatan tersebut.')->withInput();
        }

        DB::table('absensis')->insert([
            'kegiatan_id' => $request->kegiatan_id,
            'kelas' => $request->kelas,
            'jumlah_hadir' => $request->jumlah_hadir,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $absensi = DB::table('absensis')->where('id', $id)->first();
        if (!$absensi) abort(404);

        $kegiatans = DB::table('kegiatans')->where('status', 'selesai')->get();

        $kelasList = [
            'X RPL',
            'X TKJ',
            'XI RPL',
            'XI TKJ',
            'XII RPL',
            'XII TKJ'
        ];

        return view('admin.absensi.edit', compact('absensi', 'kegiatans', 'kelasList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'kelas' => 'required|string',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        // Cek apabila update menyebabkan duplikat
        $exists = DB::table('absensis')
            ->where('kegiatan_id', $request->kegiatan_id)
            ->where('kelas', $request->kelas)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Data absensi untuk kelas dan kegiatan tersebut sudah ada.')->withInput();
        }

        DB::table('absensis')->where('id', $id)->update([
            'kegiatan_id' => $request->kegiatan_id,
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
