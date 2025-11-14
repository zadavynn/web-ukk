<?php

namespace App\Http\Controllers;

use App\Models\Panitia;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index()
    {
        $panitias = Panitia::with('kegiatans')->get();
        return view('admin.panitia.index', compact('panitias'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.panitia.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:panitias,email',
            'telepon' => 'required|string|max:20',
            'kegiatan_ids' => 'array',
        ]);

        $panitia = Panitia::create($request->only(['nama', 'email', 'telepon']));
        $panitia->kegiatans()->sync($request->kegiatan_ids ?? []);

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dibuat.');
    }

    public function show($id)
    {
        $panitia = Panitia::with('kegiatans')->findOrFail($id);
        return view('admin.panitia.show', compact('panitia'));
    }

    public function edit($id)
    {
        $panitia = Panitia::with('kegiatans')->findOrFail($id);
        $kegiatans = Kegiatan::all();
        return view('admin.panitia.edit', compact('panitia', 'kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:panitias,email,' . $id,
            'telepon' => 'required|string|max:20',
            'kegiatan_ids' => 'array',
        ]);

        $panitia = Panitia::findOrFail($id);
        $panitia->update($request->only(['nama', 'email', 'telepon']));
        $panitia->kegiatans()->sync($request->kegiatan_ids ?? []);

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $panitia = Panitia::findOrFail($id);
        $panitia->delete();
        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dihapus.');
    }
}
