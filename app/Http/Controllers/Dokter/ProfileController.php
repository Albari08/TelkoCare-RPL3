<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dokter.pages.profile', [
            'title' => 'Profile Dokter'
        ]);
    }

    public function update()
    {
        request()->validate([
            'nama' => ['required'],
            'email' => ['required', Rule::unique('dokters', 'email')->ignore(auth()->guard('dokter')->user()->id)],
            'alamat' => ['required'],
            'nohp' => ['required'],
            'keahlian' => ['required'],
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            auth()->guard('dokter')->user()->update($data);
            DB::commit();
            return redirect()->back()->with('success', 'Profile berhasil diperbaharui.');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
