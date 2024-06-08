<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $data_pemeriksaan = Pemeriksaan::with(['tindakans', 'diagnosas', 'obats'])->where('dokter_id', auth()->guard('dokter')->user()->id)->latest()->get();
        return view('dokter.pages.pemeriksaan.index', [
            'title' => 'Riwayat Pemeriksaan',
            'data_pemeriksaan' => $data_pemeriksaan
        ]);
    }
}
