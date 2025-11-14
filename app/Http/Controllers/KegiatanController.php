<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Panitia;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('panitias', 'sponsors')->get();
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        $panitias = Panitia::all();
        $sponsors = Sponsor::all();
        return view('admin.kegiatan.create', compact('panitias', 'sponsors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'panitia_ids' => 'array',
            'sponsor_ids' => 'array',
        ]);

        $kegiatan = Kegiatan::create($request->only(['nama', 'deskripsi', 'tanggal']));
        $kegiatan->panitias()->sync($request->panitia_ids ?? []);
        $kegiatan->sponsors()->sync($request->sponsor_ids ?? []);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dibuat.');
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with('panitias', 'sponsors', 'absensis', 'catatan')->findOrFail($id);
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::with('panitias', 'sponsors')->findOrFail($id);
        $panitias = Panitia::all();
        $sponsors = Sponsor::all();
        return view('admin.kegiatan.edit', compact('kegiatan', 'panitias', 'sponsors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'panitia_ids' => 'array',
            'sponsor_ids' => 'array',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->only(['nama', 'deskripsi', 'tanggal']));
        $kegiatan->panitias()->sync($request->panitia_ids ?? []);
        $kegiatan->sponsors()->sync($request->sponsor_ids ?? []);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function finish($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update(['status' => 'selesai']);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diselesaikan.');
    }
}
