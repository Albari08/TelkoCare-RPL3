<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.doctor-login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::guard('doctor')->attempt($this->credentials($request), $request->filled('remember'))) {
            return redirect()->intended('/doctor/dashboard');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/doctor/login');
    }
}
