<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('apoteker.pages.profile', [
            'title' => 'Profile Apoteker'
        ]);
    }

    public function update()
    {
        request()->validate([
            'nama' => ['required'],
            'email' => ['required', Rule::unique('apotekers', 'email')->ignore(auth()->id())],
            'tempat_praktik' => ['required'],
            'jadwal_praktik' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            auth()->guard('apoteker')->user()->update($data);
            DB::commit();
            return redirect()->back()->with('success', 'Profile berhasil diperbaharui.');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
