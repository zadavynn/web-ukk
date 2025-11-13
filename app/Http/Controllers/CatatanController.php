<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        return view('admin.catatan.index');
    }
}
