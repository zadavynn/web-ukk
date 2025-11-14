<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::with('kegiatans')->get();
        return view('admin.sponsor.index', compact('sponsors'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.sponsor.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'jenis_sponsorship' => 'required|string|max:255',
            'kegiatan_ids' => 'array',
        ]);

        $sponsor = Sponsor::create($request->only(['nama', 'kontak', 'jenis_sponsorship']));
        $sponsor->kegiatans()->sync($request->kegiatan_ids ?? []);

        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dibuat.');
    }

    public function show($id)
    {
        $sponsor = Sponsor::with('kegiatans')->findOrFail($id);
        return view('admin.sponsor.show', compact('sponsor'));
    }

    public function edit($id)
    {
        $sponsor = Sponsor::with('kegiatans')->findOrFail($id);
        $kegiatans = Kegiatan::all();
        return view('admin.sponsor.edit', compact('sponsor', 'kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'jenis_sponsorship' => 'required|string|max:255',
            'kegiatan_ids' => 'array',
        ]);

        $sponsor = Sponsor::findOrFail($id);
        $sponsor->update($request->only(['nama', 'kontak', 'jenis_sponsorship']));
        $sponsor->kegiatans()->sync($request->kegiatan_ids ?? []);

        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();
        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dihapus.');
    }
}
