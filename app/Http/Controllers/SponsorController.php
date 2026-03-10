<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function index()
    {
        // Ambil sponsor
        $sponsors = DB::table('sponsors')->get();

        // Tampil halaman
        return view('admin.sponsor.index', compact('sponsors'));
    }

    public function create()
    {
        // Ambil kegiatan
        $kegiatans = DB::table('kegiatans')->get();

        // Form tambah
        return view('admin.sponsor.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sponsor' => 'required|string|max:255',
            'email_sponsor' => 'required|email|unique:sponsors,email_sponsor',
            'kegiatan_sponsor' => 'string|nullable',
        ]);

        // Simpan sponsor
        DB::table('sponsors')->insert([
            'nama_sponsor' => $request->nama_sponsor,
            'email_sponsor' => $request->email_sponsor,
            'kegiatan_sponsor' => $request->kegiatan_sponsor,
        ]);

        // Redirect index
        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dibuat.');
    }

    public function edit($id)
    {
        // Ambil data
        $sponsor = DB::table('sponsors')->where('id', $id)->first();

        // Form edit
        return view('admin.sponsor.edit', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_sponsor' => 'required|string|max:255',
            'email_sponsor' => 'required|email|unique:sponsors,email_sponsor,' . $id,
            'kegiatan_sponsor' => 'string|nullable',
        ]);

        // Update sponsor
        DB::table('sponsors')->where('id', $id)->update([
            'nama_sponsor' => $request->nama_sponsor,
            'email_sponsor' => $request->email_sponsor,
            'kegiatan_sponsor' => $request->kegiatan_sponsor,
        ]);

        // Redirect index
        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus sponsor
        DB::table('sponsors')->where('id', $id)->delete();

        // Redirect index
        return redirect()->route('sponsor.index')->with('success', 'Sponsor berhasil dihapus.');
    }
}
