<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = DB::table('kegiatans')->get()->map(function ($kegiatan) {
            $kegiatan->panitias = DB::table('kegiatan_panitia')
                ->join('panitias', 'kegiatan_panitia.panitia_id', '=', 'panitias.id')
                ->where('kegiatan_panitia.kegiatan_id', $kegiatan->id)
                ->pluck('panitias.nama')
                ->toArray();
            $kegiatan->sponsors = DB::table('kegiatan_sponsor')
                ->join('sponsors', 'kegiatan_sponsor.sponsor_id', '=', 'sponsors.id')
                ->where('kegiatan_sponsor.kegiatan_id', $kegiatan->id)
                ->pluck('sponsors.nama_sponsor')
                ->toArray();
            return $kegiatan;
        });
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        $panitias = DB::table('panitias')->get();
        $sponsors = DB::table('sponsors')->get();
        return view('admin.kegiatan.create', compact('panitias', 'sponsors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required|string|max:255',
            'panitia_ids' => 'array',
            'sponsor_ids' => 'array',
        ]);

        $id = DB::table('kegiatans')->insertGetId([
            'nama' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal_kegiatan,
            'lokasi' => $request->lokasi_kegiatan,
            'status' => 'belum_selesai',
        ]);

        if ($request->panitia_ids) {
            foreach ($request->panitia_ids as $pid) {
                DB::table('kegiatan_panitia')->insert([
                    'kegiatan_id' => $id,
                    'panitia_id' => $pid,
                ]);
            }
        }

        if ($request->sponsor_ids) {
            foreach ($request->sponsor_ids as $sid) {
                DB::table('kegiatan_sponsor')->insert([
                    'kegiatan_id' => $id,
                    'sponsor_id' => $sid,
                ]);
            }
        }

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dibuat.');
    }

    public function show($id)
    {
        $kegiatan = DB::table('kegiatans')->where('id', $id)->first();
        if (!$kegiatan) abort(404);
        $kegiatan->panitias = DB::table('kegiatan_panitia')
            ->join('panitias', 'kegiatan_panitia.panitia_id', '=', 'panitias.id')
            ->where('kegiatan_panitia.kegiatan_id', $id)
            ->pluck('panitias.nama')
            ->toArray();
        $kegiatan->sponsors = DB::table('kegiatan_sponsor')
            ->join('sponsors', 'kegiatan_sponsor.sponsor_id', '=', 'sponsors.id')
            ->where('kegiatan_sponsor.kegiatan_id', $id)
            ->pluck('sponsors.nama_sponsor')
            ->toArray();
        $kegiatan->absensis = DB::table('absensis')
            ->join('panitias', 'absensis.panitia_id', '=', 'panitias.id')
            ->where('absensis.kegiatan_id', $id)
            ->select('absensis.*', 'panitias.nama as panitia_nama')
            ->get();
        $kegiatan->catatan = DB::table('catatans')->where('kegiatan_id', $id)->first();
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        $panitias = DB::table('panitias')->get();
        $sponsors = DB::table('sponsors')->get();
        $selected_panitias = DB::table('kegiatan_panitia')
            ->where('kegiatan_id', $id)
            ->pluck('panitia_id')
            ->toArray();
        $selected_sponsors = DB::table('kegiatan_sponsor')
            ->where('kegiatan_id', $id)
            ->pluck('sponsor_id')
            ->toArray();
        return view('admin.kegiatan.edit', compact('kegiatan', 'panitias', 'sponsors', 'selected_panitias', 'selected_sponsors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required|string|max:255',
            'panitia_ids' => 'array',
            'sponsor_ids' => 'array',
        ]);

        DB::table('kegiatans')->where('id', $id)->update([
            'nama' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal_kegiatan,
            'lokasi' => $request->lokasi_kegiatan,
        ]);

        DB::table('kegiatan_panitia')->where('kegiatan_id', $id)->delete();
        if ($request->panitia_ids) {
            foreach ($request->panitia_ids as $pid) {
                DB::table('kegiatan_panitia')->insert([
                    'kegiatan_id' => $id,
                    'panitia_id' => $pid,
                ]);
            }
        }

        DB::table('kegiatan_sponsor')->where('kegiatan_id', $id)->delete();
        if ($request->sponsor_ids) {
            foreach ($request->sponsor_ids as $sid) {
                DB::table('kegiatan_sponsor')->insert([
                    'kegiatan_id' => $id,
                    'sponsor_id' => $sid,
                ]);
            }
        }

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('kegiatan_panitia')->where('kegiatan_id', $id)->delete();
        DB::table('kegiatan_sponsor')->where('kegiatan_id', $id)->delete();
        DB::table('absensis')->where('kegiatan_id', $id)->delete();
        DB::table('catatans')->where('kegiatan_id', $id)->delete();
        DB::table('kegiatans')->where('id', $id)->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function finish($id)
    {
        DB::table('kegiatans')->where('id', $id)->update(['status' => 'selesai']);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diselesaikan.');
    }
}
