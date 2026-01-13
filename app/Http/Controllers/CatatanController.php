<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanController extends Controller
{
    public function index()
    {
        $catatans = DB::table('catatans')->get();
        return view('admin.catatan.index', compact('catatans'));
    }

    public function create()
    {
        return view('admin.catatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string',
            'catatan' => 'required|string',
        ]);

        DB::table('catatans')->insert([
            'kegiatan' => $request->kegiatan,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dibuat.');
    }


    public function edit($id)
    {
        $catatan = DB::table('catatans')->where('id', $id)->first();
        return view('admin.catatan.edit', compact('catatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required|string',
            'catatan' => 'required|string',
        ]);

        DB::table('catatans')->where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
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
