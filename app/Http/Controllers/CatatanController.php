<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        $catatans = Catatan::with('kegiatan')->get();
        return view('admin.catatan.index', compact('catatans'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::where('status', 'selesai')->get();
        return view('admin.catatan.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'evaluasi' => 'required|string',
            'perbaikan' => 'required|string',
        ]);

        Catatan::create($request->all());

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dibuat.');
    }

    public function show($id)
    {
        $catatan = Catatan::with('kegiatan')->findOrFail($id);
        return view('admin.catatan.show', compact('catatan'));
    }

    public function edit($id)
    {
        $catatan = Catatan::findOrFail($id);
        $kegiatans = Kegiatan::where('status', 'selesai')->get();
        return view('admin.catatan.edit', compact('catatan', 'kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'evaluasi' => 'required|string',
            'perbaikan' => 'required|string',
        ]);

        $catatan = Catatan::findOrFail($id);
        $catatan->update($request->all());

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        $catatan->delete();
        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
