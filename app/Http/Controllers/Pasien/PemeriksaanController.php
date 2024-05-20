<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->startOfWeek(); // Tanggal awal minggu saat ini
        $endDate = Carbon::now()->endOfWeek();     // Tanggal akhir minggu saat ini
        $data_pemeriksaan = Pemeriksaan::with(['tindakans', 'diagnosas', 'obats'])->where('user_id', auth()->id());
        if (request('type')) {
            if (request('type') === 'semua')
                $data_pemeriksaan->latest();
            elseif (request('type') === 'hari-ini')
                $data_pemeriksaan->whereDate('created_at', Carbon::now());
            elseif (request('type') === 'minggu-ini')
                $data_pemeriksaan->whereBetween('created_at', [$startDate, $endDate]);
            elseif (request('type') === 'bulan-ini')
                $data_pemeriksaan->whereMonth('created_at', Carbon::now()->format('m'));
        }
        $items = $data_pemeriksaan->latest()->get();
        return view('pasien.pages.pemeriksaan.index', [
            'title' => 'Profile Pasien',
            'data_pemeriksaan' => $items
        ]);
    }
}
