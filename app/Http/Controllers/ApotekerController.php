<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoteker;

class ApotekerController extends Controller
{
    public function profile()
    {
        // Ambil data apoteker dari database
        $apoteker = Apoteker::findOrFail(auth()->user()->id); // Anda mungkin perlu menyesuaikan cara pengambilan data apoteker dengan sistem autentikasi yang digunakan

        // Tampilkan view dengan data apoteker
        return view('apoteker.profile', compact('apoteker'));
    }

    public function editProfile()
    {
        // Ambil data apoteker dari database
        $apoteker = Apoteker::findOrFail(auth()->user()->id); // Anda mungkin perlu menyesuaikan cara pengambilan data apoteker dengan sistem autentikasi yang digunakan

        // Tampilkan view dengan form edit profil
        return view('apoteker.edit_profile', compact('apoteker'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'jadwal_praktik' => 'required|string|max:255',
            'tempat_praktik' => 'required|string|max:255',
        ]);

        // Ambil data apoteker dari database
        $apoteker = Apoteker::findOrFail(auth()->user()->id); // Anda mungkin perlu menyesuaikan cara pengambilan data apoteker dengan sistem autentikasi yang digunakan

        // Update data apoteker berdasarkan input yang diterima
        $apoteker->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jadwal_praktik' => $request->jadwal_praktik,
            'tempat_praktik' => $request->tempat_praktik,
        ]);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('apoteker.profile')->with('success', 'Profil berhasil diperbarui.');

    }

    public function changePassword()
    {
        // Tampilkan view dengan form ganti password
        return view('apoteker.change_password');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ambil data apoteker dari database
        $apoteker = Apoteker::findOrFail(auth()->user()->id); // Anda mungkin perlu menyesuaikan cara pengambilan data apoteker dengan sistem autentikasi yang digunakan

        // Update kata sandi apoteker
        $apoteker->update([
            'password' => Hash::make($request->password),
        ]);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('apoteker.profile')->with('success', 'Kata sandi berhasil diperbarui.');
    }

    public function barangTerjual()
    {
        // Ambil data apoteker dari database
        $apoteker = Apoteker::findOrFail(auth()->user()->id); // Anda mungkin perlu menyesuaikan cara pengambilan data apoteker dengan sistem autentikasi yang digunakan

        // Ambil data penjualan obat yang terkait dengan apoteker
        $penjualanObat = $apoteker->penjualanObat;

        // Tampilkan view dengan data barang terjual
        return view('apoteker.barang_terjual', compact('penjualanObat'));
    }
}
