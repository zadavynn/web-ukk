<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanitiaController extends Controller
{
    public function index()
    {
        $panitias = DB::table('panitias')->get();
        foreach ($panitias as $panitia) {
            $panitia->kegiatans = DB::table('kegiatan_panitia')
                ->join('kegiatans', 'kegiatan_panitia.kegiatan_id', '=', 'kegiatans.id')
                ->where('kegiatan_panitia.panitia_id', $panitia->id)
                ->pluck('kegiatans.nama')
                ->toArray();
        }
        return view('admin.panitia.index', compact('panitias'));
    }

    public function create()
    {
        $kegiatans = DB::table('kegiatans')->get();
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

        $id = DB::table('panitias')->insertGetId([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ]);

        if ($request->kegiatan_ids) {
            foreach ($request->kegiatan_ids as $kid) {
                DB::table('kegiatan_panitia')->insert([
                    'panitia_id' => $id,
                    'kegiatan_id' => $kid,
                ]);
            }
        }

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dibuat.');
    }

    public function show($id)
    {
        $panitia = DB::table('panitias')->where('id', $id)->first();
        if (!$panitia) abort(404);
        $panitia->kegiatans = DB::table('kegiatan_panitia')
            ->join('kegiatans', 'kegiatan_panitia.kegiatan_id', '=', 'kegiatans.id')
            ->where('kegiatan_panitia.panitia_id', $id)
            ->pluck('kegiatans.nama')
            ->toArray();
        return view('admin.panitia.show', compact('panitia'));
    }

    public function edit($id)
    {
        $panitia = DB::table('panitias')->where('id', $id)->first();
        if (!$panitia) abort(404);
        $kegiatans = DB::table('kegiatans')->get();
        $selectedKegiatans = DB::table('kegiatan_panitia')
            ->where('panitia_id', $id)
            ->pluck('kegiatan_id')
            ->toArray();
        $panitia->selected_kegiatans = $selectedKegiatans;
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

        DB::table('panitias')->where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ]);

        DB::table('kegiatan_panitia')->where('panitia_id', $id)->delete();
        if ($request->kegiatan_ids) {
            foreach ($request->kegiatan_ids as $kid) {
                DB::table('kegiatan_panitia')->insert([
                    'panitia_id' => $id,
                    'kegiatan_id' => $kid,
                ]);
            }
        }

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('kegiatan_panitia')->where('panitia_id', $id)->delete();
        DB::table('panitias')->where('id', $id)->delete();
        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dihapus.');
    }
}
