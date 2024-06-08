<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbahPasswordController extends Controller
{
    public function index()
    {
        return view('apoteker.pages.ubah-password', [
            'title' => 'Ubah Kata Sandi'
        ]);
    }

    public function update()
    {
        request()->validate([
            'password' => ['required', 'min:5', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        DB::beginTransaction();
        try {
            auth()->guard('apoteker')->user()->update([
                'password' => bcrypt(
                    request('password')
                )
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Kata Sandi berhasil diperbaharui.');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
