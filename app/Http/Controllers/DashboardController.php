<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now('Asia/Jakarta');

        // Buat array tanggal untuk seminggu terakhir
        $dates = [];
        for ($i = 6; $i >= 0; $i--) {
            $dates[] = $now->copy()->subDays($i)->format('d F Y');
        }

        // Ambil data antrian per tanggal dan loket untuk user yang sedang login
        $userId = Auth::user()->id;
        $dataLoket1 = [];
        $dataLoket2 = [];
        foreach ($dates as $date) {
            $dataLoket1[] = Antrian::whereDate('created_at', Carbon::parse($date))
                ->where('loket', 1)
                ->where('user_id', $userId)
                ->count();
            $dataLoket2[] = Antrian::whereDate('created_at', Carbon::parse($date))
                ->where('loket', 2)
                ->where('user_id', $userId)
                ->count();
        }
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $antrians = Antrian::where('user_id', Auth::user()->id)
            ->whereDate('waktu_antrian', '>=', $today)
            ->orderBy('waktu_antrian')
            ->get();
        $groupedAntrians = $antrians->groupBy(function ($antrian) {
            return Carbon::parse($antrian->waktu_antrian)->format('d F Y');
        });
        return view('rafly.pasien.dashboard', compact('today', 'groupedAntrians' ,'dates', 'dataLoket1', 'dataLoket2'));
    }
}