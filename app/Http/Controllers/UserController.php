<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login-pasien');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            // Buat data log user
            $logUser = LogUser::create([
                'tanggal' => now('Asia/Jakarta')->toDateString(),
                'waktu' => now('Asia/Jakarta')->toTimeString(),
                'aktifitas' => "Melakukan Login",
                'user_id' => $user->id,
            ]);
            return redirect()->intended('/pasien/antrian');
        }

        // jika ga ada data user yang valid maka kembalikan lagi ke halaman login
// pastikan kirim pesan error juga kalau login gagal ya
        return redirect('login')->withInput()->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function adminShow($id){
        $pasien = User::find($id);
        return view('azkanoor.profile-pasien', compact('pasien'));
    }
    public function adminUpdate($id, Request $request)
    {
        $request->validate([
            'nohp' => 'string',
            'alamat' => 'string',
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);
        return redirect()->back()->with('success', 'User berhasil diperbarui.');
    }
}