<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('kegiatan')->get();
        return view('admin.absensi.index', compact('absensis'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::where('status', 'selesai')->get();
        return view('admin.absensi.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'kelas' => 'required|in:X RPL,X TKJ,XI RPL,XI TKJ,XII RPL,XII TKJ',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dibuat.');
    }

    public function show($id)
    {
        $absensi = Absensi::with('kegiatan')->findOrFail($id);
        return view('admin.absensi.show', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $kegiatans = Kegiatan::where('status', 'selesai')->get();
        return view('admin.absensi.edit', compact('absensi', 'kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'kelas' => 'required|in:X RPL,X TKJ,XI RPL,XI TKJ,XII RPL,XII TKJ',
            'jumlah_hadir' => 'required|integer|min:0',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
