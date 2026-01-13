<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanitiaController extends Controller
{
    public function index()
    {
        $panitias = DB::table('panitias')->get();

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
            'sosmed' => 'required',
            'telepon' => 'required|string|max:20',
            'jabatan' => 'required|in:ketua,wakil_ketua,bendahara,sekretaris,anggota',
            'quotes' => 'required|string',
        ]);

        DB::table('panitias')->insert([
            'nama' => $request->nama,
            'sosmed' => $request->sosmed,
            'telepon' => $request->telepon,
            'jabatan' => $request->jabatan,
            'quotes' => $request->quotes,
        ]);

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dibuat.');
    }

    public function edit($id)
    {
        $panitia = DB::table('panitias')->where('id', $id)->first();
        return view('admin.panitia.edit', compact('panitia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'sosmed' => 'required',
            'telepon' => 'required|string|max:20',
            'jabatan' => 'required|in:ketua,wakil_ketua,bendahara,sekretaris,anggota',
            'quotes' => 'required|string',
        ]);

        DB::table('panitias')->where('id', $id)->update([
            'nama' => $request->nama,
            'sosmed' => $request->sosmed,
            'telepon' => $request->telepon,
            'jabatan' => $request->jabatan,
            'quotes' => $request->quotes,
        ]);

        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('panitias')->where('id', $id)->delete();
        return redirect()->route('panitia.index')->with('success', 'Panitia berhasil dihapus.');
    }
}
