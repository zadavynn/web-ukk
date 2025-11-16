<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = DB::table('sponsors')->get();
        foreach ($sponsors as $sponsor) {
            $sponsor->kegiatans = DB::table('kegiatan_sponsor')
                ->join('kegiatans', 'kegiatan_sponsor.kegiatan_id', '=', 'kegiatans.id')
                ->where('kegiatan_sponsor.sponsor_id', $sponsor->id)
                ->pluck('kegiatans.nama')
                ->toArray();
        }
        return view('admin.sponsor.index', compact('sponsors'));
    }

    public function create()
    {
        $kegiatans = DB::table('kegiatans')->get();
        return view('admin.sponsor.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sponsor' => 'required|string|max:255',
            'kontak_sponsor' => 'required|string|max:255',
            'kegiatan_ids' => 'array',
        ]);

        $id = DB::table('sponsors')->insertGetId([
            'nama_sponsor' => $request->nama_sponsor,
            'kontak_sponsor' => $request->kontak_sponsor,
        ]);

        if ($request->kegiatan_ids) {
            foreach ($request->kegiatan_ids as $kid) {
                DB::table('kegiatan_sponsor')->insert([
                    'sponsor_id' => $id,
                    'kegiatan_id' => $kid,
                ]);
            }
        }

        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dibuat.');
    }

    public function show($id)
    {
        $sponsor = DB::table('sponsors')->where('id', $id)->first();
        if (!$sponsor) abort(404);
        $sponsor->kegiatans = DB::table('kegiatan_sponsor')
            ->join('kegiatans', 'kegiatan_sponsor.kegiatan_id', '=', 'kegiatans.id')
            ->where('kegiatan_sponsor.sponsor_id', $id)
            ->pluck('kegiatans.nama')
            ->toArray();
        return view('admin.sponsor.show', compact('sponsor'));
    }

    public function edit($id)
    {
        $sponsor = DB::table('sponsors')->where('id', $id)->first();
        if (!$sponsor) abort(404);
        $kegiatans = DB::table('kegiatans')->get();
        $selectedKegiatans = DB::table('kegiatan_sponsor')
            ->where('sponsor_id', $id)
            ->pluck('kegiatan_id')
            ->toArray();
        $sponsor->selected_kegiatans = $selectedKegiatans;
        return view('admin.sponsor.edit', compact('sponsor', 'kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sponsor' => 'required|string|max:255',
            'kontak_sponsor' => 'required|string|max:255',
            'kegiatan_ids' => 'array',
        ]);

        DB::table('sponsors')->where('id', $id)->update([
            'nama_sponsor' => $request->nama_sponsor,
            'kontak_sponsor' => $request->kontak_sponsor,
        ]);

        DB::table('kegiatan_sponsor')->where('sponsor_id', $id)->delete();
        if ($request->kegiatan_ids) {
            foreach ($request->kegiatan_ids as $kid) {
                DB::table('kegiatan_sponsor')->insert([
                    'sponsor_id' => $id,
                    'kegiatan_id' => $kid,
                ]);
            }
        }

        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('kegiatan_sponsor')->where('sponsor_id', $id)->delete();
        DB::table('sponsors')->where('id', $id)->delete();
        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dihapus.');
    }
}
