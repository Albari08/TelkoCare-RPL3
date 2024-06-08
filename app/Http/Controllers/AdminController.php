<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('login-admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credential = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credential)) {
            $user = Auth::guard('admin')->user();
            return redirect()->intended('/admin/antrian');
        }
        return redirect('login-admin')->withInput()->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login-admin');
    }
    public function profileAdmin()
    {
        $dokters = Dokter::all();
        $pasiens = User::all();
        return view('azkanoor.profile', compact('dokters', 'pasiens'));
    }
}
