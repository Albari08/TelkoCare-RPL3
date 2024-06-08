<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $data_pemeriksaan = Pemeriksaan::with(['tindakans', 'diagnosas', 'obats'])->where('user_id', auth()->id())->latest()->get();
        return view('pasien.pages.profile', [
            'title' => 'Profile Pasien',
            'data_pemeriksaan' => $data_pemeriksaan
        ]);
    }

    public function update()
    {
        request()->validate([
            'nama' => ['required'],
            'email' => ['required', Rule::unique('users', 'email')->ignore(auth()->id())],
            'alamat' => ['required'],
            'nim' => ['required', Rule::unique('users', 'nim')->ignore(auth()->id())]
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            auth()->user()->update($data);
            DB::commit();
            return redirect()->back()->with('success', 'Profile berhasil diperbaharui.');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
