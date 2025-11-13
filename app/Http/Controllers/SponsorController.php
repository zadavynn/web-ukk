<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        return view('admin.sponsor.index');
    }
    public function create()
    {
        return view('admin.sponsor.create');
    }
    public function edit()
    {
        return view('admin.sponsor.edit');
    }
}
