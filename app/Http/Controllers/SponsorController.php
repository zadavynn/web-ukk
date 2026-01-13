<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = DB::table('sponsors')->get();
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
            'email_sponsor' => 'required|email|unique:sponsors,email_sponsor',
            'kegiatan_sponsor' => 'string|nullable',
        ]);

        DB::table('sponsors')->insert([
            'nama_sponsor' => $request->nama_sponsor,
            'email_sponsor' => $request->email_sponsor,
            'kegiatan_sponsor' => $request->kegiatan_sponsor,
        ]);

        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dibuat.');
    }

    public function edit($id)
    {
        $sponsor = DB::table('sponsors')->where('id', $id)->first();
        return view('admin.sponsor.edit', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sponsor' => 'required|string|max:255',
            'email_sponsor' => 'required|email|unique:sponsors,email_sponsor,' . $id,
            'kegiatan_sponsor' => 'string|nullable',
        ]);

        DB::table('sponsors')->where('id', $id)->update([
            'nama_sponsor' => $request->nama_sponsor,
            'email_sponsor' => $request->email_sponsor,
            'kegiatan_sponsor' => $request->kegiatan_sponsor,
        ]);

        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('sponsors')->where('id', $id)->delete();
        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dihapus.');
    }
}
