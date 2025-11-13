<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index()
    {
        return view('admin.panitia.index');
    }
    public function create()
    {
        return view('admin.panitia.create');
    }
    public function edit()
    {
        return view('admin.panitia.edit');
    }
}
