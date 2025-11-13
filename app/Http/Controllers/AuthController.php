<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    private function getUser(): array
    {
        return [
            'username' => 'admin',
            'password' => '$2y$12$/4Ftk2cnlROzFHvpUS1yQOp7yN2YJLR.5F8pCWbMEoEnzY7j6VEx2', // password: admin123
        ];
    }
    public function loginProses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $auth = $request->only('username', 'password');

        $user = $this->getUser();
        if (
            $user['username'] === $auth['username'] &&
            Hash::check($auth['password'], $user['password'])
        ) {
            Session::put('user', $user);
            return redirect()->route('admin');
        }

        return back()->withErrors(['username' => 'Username atau password salah!']);
    }

    // public function logout()
    // {
    //     Session::flush();
    //     return redirect()->route('login');
    // }
}
