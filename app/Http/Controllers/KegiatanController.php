<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('admin.kegiatan.index');
    }
    public function create()
    {
        return view('admin.kegiatan.create');
    }
    public function edit()
    {
        return view('admin.kegiatan.edit');
    }
}
