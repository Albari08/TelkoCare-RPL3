<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('apoteker.pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credential = $request->only('email', 'password');
        if (Auth::guard('apoteker')->attempt($credential)) {
            $user = Auth::guard('apoteker')->user();
            return redirect()->intended('/apoteker');
        }
        return redirect('apoteker/login')->withInput()->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }
    public function logout()
    {
        Auth::guard('apoteker')->logout();
        return redirect('/apoteker/login');
    }
}
