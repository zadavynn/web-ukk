<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function login()
    {
        return view('user.login');
    }
}
