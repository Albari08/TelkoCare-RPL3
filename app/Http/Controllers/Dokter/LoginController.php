<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('dokter.pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credential = $request->only('email', 'password');
        if (Auth::guard('dokter')->attempt($credential)) {
            $user = Auth::guard('dokter')->user();
            return redirect()->intended('/dokter');
        }
        return redirect('dokter/login')->withInput()->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }
    public function logout()
    {
        Auth::guard('dokter')->logout();
        return redirect('/dokter/login');
    }
}
