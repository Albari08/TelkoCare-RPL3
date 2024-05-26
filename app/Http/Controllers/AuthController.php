<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required|min:3"
        ]);

        if (auth()->attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->intended('jadwal.jadwal-dokter');
        };

        return redirect()->route("login")->withErrors([
            "email" => "Tidak ada User terdaftar atau password Salah"
        ]);
    }
}
