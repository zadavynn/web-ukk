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
            ->join('panitias', 'absensis.panitia_id', '=', 'panitias.id')
            ->select('absensis.*', 'kegiatans.nama as kegiatan_nama', 'panitias.nama as panitia_nama')
            ->get();
        return view('admin.absensi.index', compact('absensis'));
    }

    public function create()
    {
        $kegiatans = DB::table('kegiatans')->where('status', 'selesai')->get();
        $panitias = DB::table('panitias')->get();

        // Filter panitia yang belum absen untuk kegiatan yang dipilih
        $available_panitias = $panitias->filter(function ($panitia) use ($kegiatans) {
            foreach ($kegiatans as $kegiatan) {
                $exists = DB::table('absensis')
                    ->where('kegiatan_id', $kegiatan->id)
                    ->where('panitia_id', $panitia->id)
                    ->exists();
                if (!$exists) {
                    return true; // Panitia belum absen untuk setidaknya satu kegiatan
                }
            }
            return false;
        });

        return view('admin.absensi.create', compact('kegiatans', 'panitias', 'available_panitias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'panitia_id' => 'required|exists:panitias,id',
            'status' => 'required|in:hadir,tidak_hadir',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Cek apakah panitia sudah absen untuk kegiatan ini
        $exists = DB::table('absensis')
            ->where('kegiatan_id', $request->kegiatan_id)
            ->where('panitia_id', $request->panitia_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Panitia ini sudah absen untuk kegiatan tersebut.')->withInput();
        }

        DB::table('absensis')->insert([
            'kegiatan_id' => $request->kegiatan_id,
            'panitia_id' => $request->panitia_id,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dibuat.');
    }

    public function show($id)
    {
        $absensi = DB::table('absensis')
            ->join('kegiatans', 'absensis.kegiatan_id', '=', 'kegiatans.id')
            ->join('panitias', 'absensis.panitia_id', '=', 'panitias.id')
            ->where('absensis.id', $id)
            ->select('absensis.*', 'kegiatans.nama as kegiatan_nama', 'panitias.nama as panitia_nama')
            ->first();
        if (!$absensi) abort(404);
        return view('admin.absensi.show', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = DB::table('absensis')->where('id', $id)->first();
        if (!$absensi) abort(404);
        $kegiatans = DB::table('kegiatans')->where('status', 'selesai')->get();
        $panitias = DB::table('panitias')->get();
        return view('admin.absensi.edit', compact('absensi', 'kegiatans', 'panitias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'panitia_id' => 'required|exists:panitias,id',
            'status' => 'required|in:hadir,tidak_hadir',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::table('absensis')->where('id', $id)->update([
            'kegiatan_id' => $request->kegiatan_id,
            'panitia_id' => $request->panitia_id,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('absensis')->where('id', $id)->delete();
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }

    public function getAvailablePanitia($kegiatanId)
    {
        $panitias = DB::table('panitias')
            ->whereNotExists(function ($query) use ($kegiatanId) {
                $query->select(DB::raw(1))
                    ->from('absensis')
                    ->whereRaw('absensis.panitia_id = panitias.id')
                    ->where('absensis.kegiatan_id', $kegiatanId);
            })
            ->select('id', 'nama')
            ->get();

        return response()->json($panitias);
    }
}
