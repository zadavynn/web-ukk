<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanController extends Controller
{
    public function index()
    {
        $catatans = DB::table('catatans')
            ->join('kegiatans', 'catatans.kegiatan_id', '=', 'kegiatans.id')
            ->select('catatans.*', 'kegiatans.nama as kegiatan_nama')
            ->get();
        return view('admin.catatan.index', compact('catatans'));
    }

    public function create()
    {
        $kegiatans = DB::table('kegiatans')->where('status', 'selesai')->get();
        return view('admin.catatan.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'catatan' => 'required|string',
        ]);

        DB::table('catatans')->insert([
            'kegiatan_id' => $request->kegiatan_id,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dibuat.');
    }

    public function show($id)
    {
        $catatan = DB::table('catatans')
            ->join('kegiatans', 'catatans.kegiatan_id', '=', 'kegiatans.id')
            ->where('catatans.id', $id)
            ->select('catatans.*', 'kegiatans.nama as kegiatan_nama')
            ->first();
        if (!$catatan) abort(404);
        return view('admin.catatan.show', compact('catatan'));
    }

    public function edit($id)
    {
        $catatan = DB::table('catatans')->where('id', $id)->first();
        if (!$catatan) abort(404);
        $kegiatans = DB::table('kegiatans')->where('status', 'selesai')->get();
        return view('admin.catatan.edit', compact('catatan', 'kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'catatan' => 'required|string',
        ]);

        DB::table('catatans')->where('id', $id)->update([
            'kegiatan_id' => $request->kegiatan_id,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('catatans')->where('id', $id)->delete();
        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
